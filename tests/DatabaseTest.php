<?php
declare(strict_types = 1);
namespace tests;

use PHPUnit\Framework\TestCase;
use epm\core\database\Connection;
use epm\core\lib\Settings;

class DatabaseTest extends TestCase
{

    public function testMySQLInvalidHost()
    {
        $this->expectException(\PDOException::class);
        $this->expectExceptionCode(2002);
        $con = new Connection(Connection::MYSQL, 'invalid', 'invalid', 'invalid', 'invalid', 'invalid');
    }

    public function testMySQLInvalidCredentials()
    {
        $this->expectException(\PDOException::class);
        $this->expectExceptionCode(1698);
        $con = new Connection(Connection::MYSQL, Settings::get('database.server'), 'invalid', 'invalid', 'invalid',
            'invalid');
    }

    public function testMySQLInvalidDatabaseName()
    {
        $this->expectException(\PDOException::class);
        $this->expectExceptionCode(1049);
        $con = new Connection(Connection::MYSQL, Settings::get('database.server'), 'invalid',
            Settings::get('database.user'), Settings::get('database.password'), 'invalid');
    }

    public function testMySQLConnectionCreated()
    {
        $con = null;
        try {
            $con = new Connection(Connection::MYSQL, Settings::get('database.server'), Settings::get('database.name'),
                Settings::get('database.user'), Settings::get('database.password'), Settings::get('database.prefix'));
            $this->assertTrue(true);
        } catch (\PDOException $e) {
            $this->assertTrue(false, $e->getMessage());
        }
    }
}
