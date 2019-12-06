<?php
declare(strict_types = 1);
namespace epm\type;

class LBool
{

    /**
     *
     * @var array $_data
     */
    private $_data;

    /**
     *
     * @var int $_lang_id
     */
    private $_lang_id;

    public function __construct(int $lang_id = 0, ?array $data = null): LBool
    {
        $this->_data = array();
        $this->_lang_id = $lang_id;
        if ($data !== null) {
            $this->_data = $data;
            foreach ($this->_data as $k => $v) {
                $this->_data[$k] = (bool) $v;
            }
        }
        return $this;
    }

    public function add(int $lang_id, bool $str): LBool
    {
        $this->_data[(int) $lang_id] = $str;
        return $this;
    }

    public function get($lang_id): bool
    {
        return $this->_data[(int) $lang_id];
    }

    public function getAll(): array
    {
        return $this->_data;
    }

    public function __toString(): string
    {
        return $this->get($this->_lang_id);
    }
}
