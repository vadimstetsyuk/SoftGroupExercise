<?php

require_once('Ingredient.php');

class Dish {
    private $name;
    private $ingredients = array();
    
    public function __construct(string $name, $ingredients) {
        $this->name = $name;
        
        foreach ($ingredients as $ingredient) {
            if ($ingredient instanceof Ingredient) {
                $this->ingredients[] = $ingredient;
            } else {
        		throw new Exception("The arguments is not an instance of the Ingredient class.");	
        	}
        }
	}

    public function getTotalCost() : float {
    	$totalCost = 0;

    	foreach ($this->ingredients as $ingredient) {
    		$totalCost += $ingredient->getCost();
    	}

    	return $totalCost;
    }

    public function showDish() {
        echo "Dish: " . $this->name;
        echo "Ingredients: <ul>";
        
        foreach ($this->ingredients as $ingredient) {
            echo "<li>".$ingredient->getName(). "</li>";
        }
        echo "</ul>";

        echo "<b>The total cost of the dish: " . $this->getTotalCost() . "</b>";
    }
}