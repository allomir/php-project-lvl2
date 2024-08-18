<?php

namespace Hexlet\Code\Tests;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use PHPUnit\Framework\TestCase;

use function Hexlet\Code\gendiff\gendiff;

## Задача-тест.
class GendiffTest extends TestCase
{
    public $diffExpected =
    "{
- follow: false
  host: hexlet.io
- proxy: 123.234.53.22
- timeout: 50
+ timeout: 20
+ verbose: true
}\n";

    public function testGendiff(): void
    {
        $this->expectOutputString($this->diffExpected);

        echo gendiff(
            __DIR__ . "/" . "fixtures/file1.json",
            __DIR__ . "/" . "fixtures/file2.json",
        );
    }
}
