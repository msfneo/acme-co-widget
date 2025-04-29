<?php
declare(strict_types=1);

namespace App\Offer;

class BogoHalf implements OfferInterface
{
    public function apply(int $quantity, float $price): float
    {
        $pairs = intdiv($quantity, 2);
        $remainder = $quantity % 2;
        $total = $pairs * ($price + ($price / 2)) + $remainder * $price;
        return round($total, 2);
    }
}
