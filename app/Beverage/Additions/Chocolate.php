<?php

namespace App\Beverage\Additions;


/**
 * Class Chocolate
 * @package App\Beverage\Additions
 */
class Chocolate extends AbstractAdditionDecorator
{
    /**
     * @return string
     */
    public function description(): string
    {
        return 'chocolate';
    }

    /**
     * @return int
     */
    public function cost(): int
    {
        return 75;
    }
}