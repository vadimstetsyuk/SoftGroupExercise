<?php

require_once("Dish.php");
require_once('Ingredient.php');

$ingredients = [
    new Ingredient("cheese", 45.50), 
    new Ingredient("butter", 34.0), 
    new Ingredient("oil", 32.3)
];

$dish1 = new Dish("Dish 1", $ingredients);
$dish1->showDish();
echo "\n";

$ingredients = [
    new Ingredient("tomato", 12.20), 
    new Ingredient("potato", 133.3), 
];

$dish2 = new Dish("Dish 2", $ingredients);
$dish2->showDish();