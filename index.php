<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\VendingMachine;


try {

    $vendingMachine = VendingMachine::make('BlackCoffee', ['Milk'/*, 'Caramel', 'Chocolate'*/]);

    echo $vendingMachine->getFormattedDescription() . "\n";
    echo $vendingMachine->getFormattedPrice() . "\n";

} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}
