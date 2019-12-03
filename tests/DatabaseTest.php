<?php
declare(strict_types = 1);
namespace tests;

use PHPUnit\Framework\TestCase;
use epm\core\database\Connection;

class DatabaseTest extends TestCase
{

    public function testMySQLConnectionCreated()
    {
        $con = new Connection(Connection::MYSQL, 'localhost', 'nettenal', 'root', '29640369', 'db_prefix');
        $this->assertInstanceOf(Connection::class, $con);
    }
}
