<?php

namespace App\Beverage\Additions;

use App\Beverage\AbstractBeverage;

/**
 * Class AbstractAdditionDecorator
 * @package App\Beverage\Additions
 */
abstract class AbstractAdditionDecorator extends AbstractBeverage
{

    /** @var AbstractBeverage */
    protected $beverage;


    /**
     * AbstractAdditionDecorator constructor.
     * @param AbstractBeverage $beverage
     */
    public function __construct(AbstractBeverage $beverage)
    {
        $this->beverage = $beverage;
    }


    /**
     * @return int
     */
    public abstract function cost(): int;

    /**
     * @return string
     */
    public abstract function description(): string;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ', ' . $this->description();
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->beverage->getCost() + $this->cost();
    }
}