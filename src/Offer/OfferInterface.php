<?php
declare(strict_types=1);
namespace App\Offer;

interface OfferInterface
{
    public function apply(int $quantity, float $price): float;
}
