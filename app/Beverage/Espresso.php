<?php

namespace App\Beverage;

/**
 * Class Espresso
 * @package App\Beverage
 */
class Espresso extends AbstractBeverage
{

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Espresso';
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return 250;
    }
}