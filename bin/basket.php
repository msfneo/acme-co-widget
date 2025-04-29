<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Basket;
use App\Catalog;
use App\DeliveryCalculator;
use App\Offer\BogoHalf;
use App\Offer\ThreeForTwo;

$catalog = new Catalog([
    'R01' => 32.95,
    'G01' => 24.95,
    'B01' => 7.95
]);

$delivery = new DeliveryCalculator([
    50 => 4.95,
    90 => 2.95
]);

$offers = [
    'R01' => new BogoHalf(),
    'B01' => new ThreeForTwo()
];

$basket = new Basket($catalog, $delivery, $offers);
$basket->add('B01', 'R01', 'R01');

echo 'Total: $' . $basket->total() . PHP_EOL;
