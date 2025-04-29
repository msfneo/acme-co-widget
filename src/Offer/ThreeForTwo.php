<?php
declare(strict_types=1);

namespace App\Offer;

class ThreeForTwo implements OfferInterface
{
    public function apply(int $quantity, float $price): float
    {
        $setsOfThree = intdiv($quantity, 3);
        $remainder = $quantity % 3;
        $total = ($setsOfThree * 2 * $price) + ($remainder * $price);
        return round($total, 2);
    }
}
