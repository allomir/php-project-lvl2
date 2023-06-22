<?php

### Настройка проекта. namespace. namespace скрипты, модули
namespace Hexlet\Code\Tests\Functions;

### Настройка проекта. namespace. настройка Composer autoload. список загрузки
use PHPUnit\Framework\TestCase;

use function Hexlet\Code\Functions\Standard\getNumberAsWord;

## Список 1. Тесты-методы. Functions\Standard
class StandardTest extends TestCase
{
    public function testGetNumberAsWordVar1(): void
    {
        ### Список Утверждения истиности фреймворк phpunit/phpunit
        $this->assertEquals('three', getNumberAsWord(3));
        $this->assertEquals('', getNumberAsWord(99));
    }

    public function testGetNumberAsWordVar2(): void
    {
        ### Список Утверждения истиности фреймворк phpunit/phpunit ecpectation строка
        $this->assertStringContainsString('thr', getNumberAsWord(3));
        $this->assertEquals('', getNumberAsWord(99));
    }
}
