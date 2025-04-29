<?php
declare(strict_types=1);
namespace App;

use App\Offer\OfferInterface;

class Basket
{
    private $catalog;
    private $delivery;
    private $offers;
    private $items = [];

    public function __construct(Catalog $catalog, DeliveryCalculator $delivery, array $offers = [])
    {
        $this->catalog = $catalog;
        $this->delivery = $delivery;
        $this->offers = $offers;
    }

    public function add(string ...$productCodes): void
    {
        foreach ($productCodes as $productCode) {
            $this->items[] = $productCode;
        }
    }

    public function total(): float
    {
        $counts = array_count_values($this->items);
        $subtotal = 0.0;

        foreach ($counts as $code => $qty) {
            $price = $this->catalog->getPrice($code);
            if (isset($this->offers[$code])) {
                $subtotal += $this->offers[$code]->apply($qty, $price);
            } else {
                $subtotal += $qty * $price;
            }
        }

        return round($subtotal + $this->delivery->calculate($subtotal), 2);
    }
}
