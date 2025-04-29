<?php
declare(strict_types=1);
namespace App;

class Catalog
{
    private $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getPrice(string $code): float
    {
        if (!isset($this->products[$code])) {
            throw new \InvalidArgumentException("Unknown product code: $code");
        }
        return $this->products[$code];
    }
}
