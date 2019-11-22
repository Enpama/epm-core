<?php
declare(strict_types = 1);
namespace tests;

use epm\core\data\Model;

class DataModelTest extends TestCase
{

    public function testHasValidDatabaseDefinition()
    {
        $dm = new Model();

        $this->assertTrue(\property_exists($dm, 'dataDefinition') && is_array($dm->dataDefinition) && count($dm->dataDefinition) > 0);
    }
}
