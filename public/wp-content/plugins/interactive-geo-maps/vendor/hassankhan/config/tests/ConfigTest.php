<?php

namespace Noodlehaus\Test;

use Noodlehaus\Config;
use Noodlehaus\Parser\Json as JsonParser;
use Noodlehaus\Writer\Json as JsonWriter;
use PHPUnit\Framework\TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-04-21 at 22:37:22.
 */
class ConfigTest extends TestCase
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @covers Config::load()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     */
    public function testLoadWithUnsupportedFormat()
    {
        $this->expectException(\Noodlehaus\Exception\UnsupportedFormatException::class);
        $this->expectExceptionMessage('Unsupported configuration format');
        $config = Config::load(__DIR__ . '/mocks/fail/error.lib');
        // $this->markTestIncomplete('Not yet implemented');
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     */
    public function testConstructWithUnsupportedFormat()
    {
        $this->expectException(\Noodlehaus\Exception\UnsupportedFormatException::class);
        $this->expectExceptionMessage('Unsupported configuration format');
        $config = new Config(__DIR__ . '/mocks/fail/error.lib');
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithInvalidPath()
    {
        $this->expectException(\Noodlehaus\Exception\FileNotFoundException::class);
        $this->expectExceptionMessage('Configuration file: [ladadeedee] cannot be found');
        $config = new Config('ladadeedee');
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithEmptyDirectory()
    {
        $this->expectException(\Noodlehaus\Exception\EmptyDirectoryException::class);
        $config = new Config(__DIR__ . '/mocks/empty');
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithArray()
    {
        $paths = [__DIR__ . '/mocks/pass/config.xml', __DIR__ . '/mocks/pass/config2.json'];
        $config = new Config($paths);

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithArrayWithNonexistentFile()
    {
        $this->expectException(\Noodlehaus\Exception\FileNotFoundException::class);
        $paths = [__DIR__ . '/mocks/pass/config.xml', __DIR__ . '/mocks/pass/config3.json'];
        $config = new Config($paths);

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithArrayWithOptionalFile()
    {
        $paths = [__DIR__ . '/mocks/pass/config.xml', '?' . __DIR__ . '/mocks/pass/config2.json'];
        $config = new Config($paths);

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithArrayWithOptionalNonexistentFile()
    {
        $paths = [__DIR__ . '/mocks/pass/config.xml', '?' . __DIR__ . '/mocks/pass/config3.json'];
        $config = new Config($paths);

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithDirectory()
    {
        $config = new Config(__DIR__ . '/mocks/dir');

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithYml()
    {
        $config = new Config(__DIR__ . '/mocks/pass/config.yml');

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithYmlDist()
    {
        $config = new Config(__DIR__ . '/mocks/pass/config.yml.dist');

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getParser()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithEmptyYml()
    {
        $config = new Config(__DIR__ . '/mocks/pass/empty.yaml');

        $expected = [];
        $actual   = $config->all();

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromFile()
     * @covers Config::getPathFromArray()
     * @covers Config::getValidPath()
     */
    public function testConstructWithFileParser()
    {
        $config = new Config(__DIR__ . '/mocks/pass/json.config', new JsonParser());

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::loadFromString()
     */
    public function testConstructWithStringParser()
    {
        $settings = file_get_contents(__DIR__ . '/mocks/pass/config.php');
        $config = new Config($settings, new \Noodlehaus\Parser\Php, true);

        $expected = 'localhost';
        $actual   = $config->get('host');

        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Config::__construct()
     * @covers Config::get()
     * @dataProvider specialConfigProvider()
     */
    public function testGetReturnsArrayMergedArray($config)
    {
        $this->assertCount(4, $config->get('servers'));
    }

    /**
     * @covers Config::toFile()
     * @covers Config::getWriter()
     */
    public function testWritesToFile()
    {
        $config = new Config(json_encode(['foo' => 'bar']), new JsonParser(), true);
        $filename = tempnam(sys_get_temp_dir(), 'config').'.json';

        $config->toFile($filename);

        $this->assertFileExists($filename);
    }

    /**
     * @covers Config::toString()
     */
    public function testWritesToString()
    {
        $config = new Config(json_encode(['foo' => 'bar']), new JsonParser(), true);

        $string = $config->toString(new JsonWriter());

        $this->assertNotEmpty($string);
    }

    /**
     * Provides names of example configuration files
     */
    public function configProvider()
    {
        return array_merge(
            [
                [new Config(__DIR__ . '/mocks/pass/config-exec.php')],
                [new Config(__DIR__ . '/mocks/pass/config.ini')],
                [new Config(__DIR__ . '/mocks/pass/config.json')],
                [new Config(__DIR__ . '/mocks/pass/config.php')],
                [new Config(__DIR__ . '/mocks/pass/config.xml')],
                [new Config(__DIR__ . '/mocks/pass/config.yaml')]
            ]
        );
    }

    /**
     * Provides names of example configuration files (for array and directory)
     */
    public function specialConfigProvider()
    {
        return [
            [
                new Config(
                    [
                        __DIR__ . '/mocks/pass/config2.json',
                        __DIR__ . '/mocks/pass/config.yaml'
                    ]
                ),
                new Config(__DIR__ . '/mocks/dir/')
            ]
        ];
    }
}
