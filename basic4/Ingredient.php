<?php

class Ingredient {
    private $name;
    private $cost;

	public function __construct(string $name, float $cost) {
		$this->name = $name;
		$this->cost = $cost;
	}

    public function getName() : string {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    } 

    public function getCost() : float {
        return $this->cost;
    }   

    public function setCost($cost) {
        $this->cost = $cost;
    }
}