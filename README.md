<a name="readme-top"></a>

# Welcome to LocalWP Starter

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

本 repo 是提供給 LocalWP 新建立本地端專案使用, 可以方便的搭配 github template 幫 LocalWP 增加版控.
<br><br>

## 事前準備

此專案需搭配 [LocalWP][localwp-url] 使用. deployment 需安裝 [NodeJS][nodejs-url] 與 [AWS-CDK][aws-cdk-url]. 如果執行環境為 Windows, 建議安裝 Git for Windows 時勾選 `Add a Git Bash Profile to Windows Terminal`
<br><br>

## USAGE

### 新建專案

如果沒有 template 可以使用請先 fork 此 repo, 並且打開 github settings 將其設定為 template.<br>
再使用此 template 開啟一個新的 repo, 使用 code -> download zip 下載打包檔, 就可以用此 zip 檔案來建立 LocalWP 新專案.
<br><br>

### 既有專案

如果既有 WordPress 網站需要增加版控，請依以下方式執行：

1. 假設網站遷移至 LocalWP 時，網址為 `yourdomain.local`，所在專案資料夾為 `yourdomain`。請使用 localwp-starter 作為 template，在 github 上新增一個 repo，名稱與 `yourdomain` 相同：![README-2023-07-04-16-26-05](https://raw.githubusercontent.com/tellustek/tellustek-official-image/main/README-2023-07-04-16-26-05.png)

2. 在網站上安裝 [WP Migrate Lite](https://tw.wordpress.org/plugins/wp-migrate-db/)，執行 MIGRATE / EXPORT 匯出網站。
3. 在 Database 的 Stand Find & Replace 中，設定 `網址` 及 `資料夾位置` 的取代文字：

   - 網址取代為：`yourdomain.local`
   - 資料夾位置取代為：`/c/Users/username/Local\ Sites/yourdomain/app/public` \* 此處 yourname 代表 Windows 系統中的使用者號；yourdomain 需與前一個項目相同。
     ![README-2023-07-04-15-46-48](https://raw.githubusercontent.com/tellustek/tellustek-official-image/main/README-2023-07-04-15-46-48.png)

4. Media Upload、Themes、Plugins、Other files、WordPress Core Files 建議都全選，以便完整恢復網站，按下 EXPORT。系統將產生並自動下載打包 zip 檔案。

5. 開啟 LocalWP，拖曳前述打包的 ZIP 檔案，建立專案並填入以下資訊：

   - Local site Domain 和前述 `yourdomain.local` 相同
   - Local Site Path 格式為 `~\Local Sites\yourdomain`
     ![README-2023-07-04-16-16-12](https://raw.githubusercontent.com/tellustek/tellustek-official-image/main/README-2023-07-04-16-16-12.png)

6. 按照 LocalWP 流程，將專案建立完成。

### 增加版控

專案建立完成之後

1. 點擊 `Open site shell` 開啟終端機 (Windows 請使用 git bash 作為終端機工具進行開啟)
2. 輸入 `cd ../..` 回到專案根目錄
3. 輸入 `git clone <NEW_PROJECT_REPO_URL> repo` 將 github 上建立好的專案 repo clone 至 LocalWP 專案根目錄的 `repo` 或是任何你喜歡的名字資料夾中
4. 進入步驟三 clone 完成的資料夾中執行 `./link.sh`<br>
   此步驟將會先複製原專案的 `plugins` 與 `themes` 至 repo 目錄後，自原專案刪除, 並在原專案目錄中建立軟聯結至 repo 中相對應的資料夾

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## DEPLOYMENT

搭配  AWS CDK 進行發佈, 實作中...

### Useful commands

- `npm run build` compile typescript to js
- `npm run watch` watch for changes and compile
- `npm run test` perform the jest unit tests
- `cdk deploy` deploy this stack to your default AWS account/region
- `cdk diff` compare deployed stack with current state
- `cdk synth` emits the synthesized CloudFormation template

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- LICENSE -->

## License

MIT License.
<br><br>

<!-- ROADMAP -->

## ROADMAP

- [x] 完成本地開發搭配
- [x] 基本還原功能
- [x] Akeeba 還原測試
- [ ] Deployment scripts

任何問題或是討論都歡迎在 [issues][issues-url] 提出
<br><br>

<!-- CONTACT -->

## CONTACT

Shingo - [@0xShingo](https://twitter.com/0xShingo) - shingo@tellustek.com

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->

<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/tellustek/localwp-starter.svg?style=for-the-badge
[contributors-url]: https://github.com/tellustek/localwp-starter/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/tellustek/localwp-starter.svg?style=for-the-badge
[forks-url]: https://github.com/tellustek/localwp-starter/network/members
[stars-shield]: https://img.shields.io/github/stars/tellustek/localwp-starter.svg?style=for-the-badge
[stars-url]: https://github.com/tellustek/localwp-starter/stargazers
[issues-shield]: https://img.shields.io/github/issues/tellustek/localwp-starter.svg?style=for-the-badge
[issues-url]: https://github.com/tellustek/localwp-starter/issues
[license-shield]: https://img.shields.io/github/license/tellustek/localwp-starter.svg?style=for-the-badge
[license-url]: https://github.com/tellustek/localwp-starter/blob/master/LICENSE.txt
[localwp-url]: https://localwp.com/
[issues-url]: https://github.com/tellustek/localwp-starter/issues
[nodejs-url]: https://nodejs.org/
[aws-cdk-url]: https://aws.amazon.com/cdk/
