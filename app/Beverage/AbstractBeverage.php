<?php

namespace App\Beverage;

/**
 * Class AbstractBeverage
 * @package App\Beverage
 */
abstract class AbstractBeverage
{
    /**
     * @return string
     */
    public abstract function getDescription(): string;

    /**
     * @return int
     */
    public abstract function getCost(): int;
}