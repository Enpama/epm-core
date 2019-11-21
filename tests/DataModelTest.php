<?php
declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;

class DataModelTest extends TestCase
{
    public function testHasValidDatabaseDefinition()
    {
        $dm = new \epm\core\data\Model();

        $this->assertTrue(
            \property_exists($dm, 'dataDefinition') &&
                is_array($dm->dataDefinition) &&
                count($dm->dataDefinition) > 0
        );
    }
}
