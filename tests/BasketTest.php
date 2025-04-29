<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Basket;
use App\Catalog;
use App\DeliveryCalculator;
use App\Offer\BogoHalf;
use App\Offer\ThreeForTwo;

class BasketTest extends TestCase
{
    public function test_basket_with_bogo_half(): void
    {
        $catalog = new Catalog(['R01' => 32.95]);
        $delivery = new DeliveryCalculator([50 => 4.95, 90 => 2.95]);
        $offers = ['R01' => new BogoHalf()];

        $basket = new Basket($catalog, $delivery, $offers);
        $basket->add('R01', 'R01');

        $this->assertEquals(54.38, $basket->total());
    }

    public function test_three_for_two(): void
    {
        $catalog = new Catalog(['B01' => 7.95]);
        $delivery = new DeliveryCalculator([50 => 4.95, 90 => 2.95]);
        $offers = ['B01' => new ThreeForTwo()];

        $basket = new Basket($catalog, $delivery, $offers);
        $basket->add('B01', 'B01', 'B01');

        $this->assertEquals(20.85, $basket->total());
    }
}
