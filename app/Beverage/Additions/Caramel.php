<?php

namespace App\Beverage\Additions;


/**
 * Class Caramel
 * @package App\Beverage\Additions
 */
class Caramel extends AbstractAdditionDecorator
{
    /**
     * @return string
     */
    public function description(): string
    {
        return 'caramel';
    }

    /**
     * @return int
     */
    public function cost(): int
    {
        return 85;
    }
}