<?php

namespace App;

use App\Beverage\AbstractBeverage;
use App\Exceptions\InvalidAdditionException;
use App\Exceptions\InvalidBeverageException;

/**
 * Class VendingMachine
 * @package App
 */
class VendingMachine
{

    /** @var AbstractBeverage */
    public $beverage;


    /**
     * VendingMachine constructor.
     * @param AbstractBeverage $beverage
     */
    public function __construct(AbstractBeverage $beverage)
    {
        $this->beverage = $beverage;
    }

    /**
     * @param string $beverageName
     * @param array $additions
     * @return VendingMachine
     * @throws InvalidAdditionException
     * @throws InvalidBeverageException
     */
    public static function make(string $beverageName, array $additions = []): VendingMachine
    {
        $beverageClass = '\\App\\Beverage\\' . $beverageName;
        self::ensureIsValidBeverage($beverageClass);

        $beverage = new $beverageClass();

        foreach ($additions as $additionName) {
            $additionClass = '\\App\\Beverage\\Additions\\' . $additionName;
            self::ensureIsValidAddition($additionClass);

            $beverage = new $additionClass($beverage);
        }

        return new self($beverage);
    }

    /**
     * @return string
     */
    public function getFormattedDescription(): string
    {
        return 'Product: ' . $this->beverage->getDescription();
    }

    /**
     * @return string
     */
    public function getFormattedPrice(): string
    {
        $price = $this->beverage->getCost() / 100;
        return 'Price: ' . number_format($price, 2);
    }

    /**
     * @param string $className
     * @throws InvalidBeverageException
     */
    private static function ensureIsValidBeverage(string $className): void
    {
        if (!class_exists($className)) {
            throw new InvalidBeverageException($className . ' is not a valid Beverage');
        }
    }

    /**
     * @param string $className
     * @throws InvalidAdditionException
     */
    private static function ensureIsValidAddition(string $className): void
    {
        if (!class_exists($className)) {
            throw new InvalidAdditionException($className . ' is not a valid Addition');
        }
    }
}