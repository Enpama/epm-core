<?php
declare(strict_types = 1);
namespace epm\core\data;

class Definition
{

    /** @var  string $table */
    public $table = '';

    /** @var  Field[] $fields */
    public $fields = array();

    /** @var  string $prefix */
    public $prefix = '';

    /** @var  string $sign */
    public $sign = '';

    /** @var string $primary_key */
    public $primary_key = '';

    public $indexes = array();

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function addField(array $data): Definition
    {
        $field = new Field($data);
        $this->fields[$data['key']] = $field;
        return $this;
    }

    public function setPrimaryKey($key)
    {
        $this->primary_key = $key;
    }

    public function addIndex($key, $type)
    {}

    public function getCreateSQL()
    {
        $query = 'CREATE TABLE `' . $this->prefix . $this->table . '` ( ';
        foreach ($this->fields as $field) {
            $query .= $this->getFieldSQL($field) . ', ';
        }
        $t = '`id` mediumint(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE={_DB_ENGINE_} DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
    }

    private function getFieldSQL(Field $field)
    {
        $query .= '`' . $field->key . '` ' . $field->type;
        if ($field->key === Field::BOOL) {
            $query .= '(1)';
        } elseif ($field->length !== - 1) {
            if ($field->key === Field::DECIMAL) {
                $query .= '(' . $field->length . ',2)';
            } else {
                $query .= '(' . $field->length . ')';
            }
        }
        return $query;
    }
}
