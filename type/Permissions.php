<?php
declare(strict_types = 1);
namespace epm\type;

class Permissions
{

    /**
     *
     * @var integer
     */
    const EMPLOYEES = 1;

    /**
     *
     * @var integer edit own products
     */
    const PRODUCTS = 2;

    /**
     *
     * @var integer edit all products
     */
    const PRODUCTS_UNIVERSAL = 3;

    /**
     *
     * @var integer
     */
    const CMS = 4;

    /**
     *
     * @var integer
     */
    const ORDERS = 5;

    /**
     *
     * @var integer
     */
    const SITE_SETTINGS = 6;

    /**
     *
     * @var integer
     */
    const MODULES = 7;

    /**
     *
     * @var integer
     */
    const PRODUCT_CATEGORIES = 8;

    /**
     *
     * @var integer
     */
    const CUSTOMERS = 10;

    /**
     *
     * @var integer
     */
    const PRODUCT_ATTRIBUTES = 12;

    /**
     *
     * @var integer
     */
    const PRODUCT_FEATURES = 14;

    /**
     *
     * @var integer
     */
    const BRANDS = 16;

    /**
     *
     * @var integer
     */
    const UPLOAD = 19;

    /**
     *
     * @var integer
     */
    const LANGS = 20;

    /**
     *
     * @var integer
     */
    const BACKUP = 21;

    /**
     *
     * @var int[]
     */
    private $data = array();

    /**
     *
     * @param string $serialized_data
     */
    public function __construct(string $serialized_data)
    {
        $this->data = array_map('intval', explode('.', $string));
    }

    /**
     *
     * @param int $p
     * @return Permissions
     */
    public function add(int $p): Permissions
    {
        if (\array_search($p, $this->data, true) === false) {
            $this->data[] = $p;
        }
        return $this;
    }

    /**
     *
     * @param int $p
     * @return Permissions
     */
    public function remove(int $p): Permissions
    {
        foreach ($this->data as $k => $v) {
            if ($p === $v) {
                unset($this->data[$k]);
            }
        }

        return $this;
    }

    /**
     *
     * @param int $p
     * @return bool
     */
    public function check(int $p): bool
    {
        return \array_search($p, $this->data, true) !== false;
    }

    /**
     *
     * @param int[] $ps
     * @return bool
     */
    public function checkAll(array $ps): bool
    {
        $e = true;
        foreach ($ps as $p) {
            $e = $e & $this->check($p);
        }

        return $e;
    }

    /**
     *
     * @param int[] $ps
     * @return bool
     */
    public function checkAny(array $ps): bool
    {
        $e = false;
        foreach ($ps as $p) {
            $e = $e || $this->check($p);
        }

        return $e;
    }

    /**
     *
     * @return string
     */
    public function __toString(): string
    {
        return implode('.', $this->data);
    }
}
