<?php

namespace App\Beverage\Additions;


/**
 * Class Milk
 * @package App\Beverage\Additions
 */
class Milk extends AbstractAdditionDecorator
{
    /**
     * @return string
     */
    public function description(): string
    {
        return 'milk';
    }

    /**
     * @return int
     */
    public function cost(): int
    {
        return 50;
    }
}