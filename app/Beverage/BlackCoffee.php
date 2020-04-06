<?php

namespace App\Beverage;

/**
 * Class BlackCoffee
 * @package App\Beverage
 */
class BlackCoffee extends AbstractBeverage
{

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Black coffee';
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return 200;
    }
}