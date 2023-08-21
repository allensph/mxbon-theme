// quick note: 如何共用 alb

/*
* TODOs:
* 如何共用 alb, 使用者上傳資料, 資料庫匯入, 綁定正式網址, health check
*/

import * as cdk from 'aws-cdk-lib';
import { Construct } from 'constructs';
import * as ec2 from 'aws-cdk-lib/aws-ec2'
import * as efs from 'aws-cdk-lib/aws-efs'
import * as ecs from 'aws-cdk-lib/aws-ecs'
import * as ecrAssets from 'aws-cdk-lib/aws-ecr-assets'
import * as ecsPatterns from 'aws-cdk-lib/aws-ecs-patterns'
import * as dotenv from 'dotenv'
import * as path from 'path'
dotenv.config()

export class TellustekLocalWpStack extends cdk.Stack {
  constructor(scope: Construct, id: string, props?: cdk.StackProps) {
    super(scope, id, props);

    // Option 1
    // 建立新的 VPC 與 EFS
    const vpc = new ec2.Vpc(this, 'LocalWPVpc', {
      natGateways: 1
    })
    const fileSystem = new efs.FileSystem(this, 'FileSystem', {
      fileSystemName: `${process.env.PROJECT_NAME || 'Example'}Wordpress`,
      vpc,
      encrypted: false,
      lifecyclePolicy: efs.LifecyclePolicy.AFTER_30_DAYS,
      removalPolicy: cdk.RemovalPolicy.DESTROY // for develop only
    })

    // Option 2
    // 使用已存在的 VPC 與 EFS
    // 建立新的 private subnet, 使用已存在的 NAT
    // const vpc = ec2.Vpc.fromLookup(this, 'LocalWPVpc', {
    //   vpcId: 'vpc-0bc7cccc0be2d8468'
    // })

    // // 建立 private subnet
    // const privateSubnet1 = new ec2.PrivateSubnet(this, 'PrivateSubnet1', {
    //   availabilityZone: vpc.availabilityZones[0],
    //   cidrBlock: '172.31.168.0/28',
    //   vpcId: vpc.vpcId,
    // })
    // const privateSubnet2 = new ec2.PrivateSubnet(this, 'PrivateSubnet2', {
    //   availabilityZone: vpc.availabilityZones[1],
    //   cidrBlock: '172.31.169.0/28',
    //   vpcId: vpc.vpcId,
    // })
    // privateSubnet1.addDefaultNatRoute('nat-0e5b7104f30a64e73')
    // privateSubnet2.addDefaultNatRoute('nat-0e5b7104f30a64e73')

    // 載入已存在的EFS, 並且連接剛剛建立的 private subnet
    // const fileSystem = efs.FileSystem.fromFileSystemAttributes(this, 'FileSystem', {
    //   fileSystemId: 'fs-08a5267db685e37f0',
    //   securityGroup: ec2.SecurityGroup.fromSecurityGroupId(this, 'sg', 'sg-0d9fe30559236fb63')
    // })

    // Option 3
    // 使用已存在的 VPC, 建立新的 EFS
    // const vpc = ec2.Vpc.fromLookup(this, 'LocalWPVpc', {
    //   vpcId: 'vpc-0bc7cccc0be2d8468'
    // })
    // const fileSystem = new efs.FileSystem(this, 'FileSystem', {
    //   fileSystemName: `${process.env.PROJECT_NAME || 'Example'}Wordpress`,
    //   vpc,
    //   encrypted: false,
    //   lifecyclePolicy: efs.LifecyclePolicy.AFTER_30_DAYS,
    //   removalPolicy: cdk.RemovalPolicy.DESTROY // for develop only
    // })

    const dockerImageAsset = new ecrAssets.DockerImageAsset(this, `${process.env.PROJECT_NAME || 'Example'}WordpressImage`, {
      directory: path.join(__dirname, '../public/wp-content')
    })

    const wp = new ecsPatterns.ApplicationLoadBalancedFargateService(this, 'WPFargateService', {
      vpc,
      cpu: 256,
      memoryLimitMiB: 512,
      // assignPublicIp: true, // 如果沒有 public IP 那就必需建立NAT
      taskImageOptions: {
        image: ecs.ContainerImage.fromDockerImageAsset(dockerImageAsset),
        environment: {
          WORDPRESS_DB_NAME: process.env.WORDPRESS_DB_NAME as string,
          WORDPRESS_DB_HOST: process.env.WORDPRESS_DB_HOST as string,
          WORDPRESS_DB_USER: process.env.WORDPRESS_DB_USER as string,
          WORDPRESS_DB_PASSWORD: process.env.WORDPRESS_DB_PASSWORD as string
        }
      }
    })

    fileSystem.connections.allowDefaultPortFrom(wp.service)

    const volumeName = 'wp-volume'
    wp.taskDefinition.addVolume({
      name: volumeName,
      efsVolumeConfiguration: {
        fileSystemId: fileSystem.fileSystemId
      }
    })
    wp.taskDefinition.defaultContainer?.addMountPoints({
      containerPath: '/var/www/html',
      readOnly: false,
      sourceVolume: volumeName
    })
    wp.targetGroup.configureHealthCheck({
      path: '/',
      healthyHttpCodes: '200-499' // TODO 修改成正確的health check方法
    })
    const targetScaling = wp.service.autoScaleTaskCount({
      minCapacity: 1,
      maxCapacity: 3
    })
    targetScaling.scaleOnCpuUtilization('cpuScaling', {
      targetUtilizationPercent: 70
    })
    targetScaling.scaleOnMemoryUtilization('memoryScaling', {
      targetUtilizationPercent: 70
    })
  }
}
