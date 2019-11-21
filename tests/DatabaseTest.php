<?php
declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testConnectionCreated()
    {
        $con = new \epm\core\database\Connection();
        $this->assertTrue(\get_class($con) === 'Connection');
    }
}
