<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\VendingMachine;
use App\Beverage\BlackCoffee;
use App\Beverage\Additions\Milk;
use App\Beverage\Additions\Chocolate;
use App\Exceptions\InvalidAdditionException;
use App\Exceptions\InvalidBeverageException;


/**
 * Class VendingMachineTest
 */
final class VendingMachineTest extends TestCase
{

    /**
     * @throws InvalidAdditionException
     * @throws InvalidBeverageException
     */
    public function testCannotMakeBeverage(): void
    {
        $this->expectException(InvalidBeverageException::class);
        VendingMachine::make('invalid');
    }

    /**
     * @throws InvalidBeverageException
     * @throws InvalidAdditionException
     */
    public function testCanMakeBeverage(): void
    {
        $vendingMachine = VendingMachine::make('BlackCoffee');
        $this->assertInstanceOf(VendingMachine::class, $vendingMachine);
        $this->assertEquals(
            (new BlackCoffee())->getCost(),
            $vendingMachine->beverage->getCost()
        );
    }

    /**
     * @throws InvalidAdditionException
     * @throws InvalidBeverageException
     */
    public function testCannotMakeBeverageWithAddition(): void
    {
        $this->expectException(InvalidAdditionException::class);
        VendingMachine::make('BlackCoffee', ['invalid']);
    }

    /**
     * @throws InvalidAdditionException
     * @throws InvalidBeverageException
     */
    public function testCanMakeBeverageWithAddition(): void
    {
        $vendingMachine = VendingMachine::make('BlackCoffee', ['Milk', 'Chocolate']);
        $this->assertInstanceOf(VendingMachine::class, $vendingMachine);

        $blackCoffee = new BlackCoffee();
        $costOfMilk = (new Milk($blackCoffee))->cost();
        $costOfChocolate = (new Chocolate($blackCoffee))->cost();

        $this->assertEquals(
            $blackCoffee->getCost() + $costOfMilk + $costOfChocolate,
            $vendingMachine->beverage->getCost()
        );
    }

}