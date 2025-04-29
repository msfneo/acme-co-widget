<?php
declare(strict_types=1);
namespace App;

class DeliveryCalculator
{
    private $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
        ksort($this->rules);
    }

    public function calculate(float $subtotal): float
    {
        foreach ($this->rules as $threshold => $charge) {
            if ($subtotal < $threshold) {
                return $charge;
            }
        }
        return 0.0;
    }
}
