<?php

class Ingredient {
    private $name;
    private $cost;

    public function __construct() {
		$this->name = '';
		$this->cost = 0.0;
	}

	public function __construct(string $name, float $cost) {
		$this->name = $name;
		$this->cost = $cost;
	}

    public function getName() : string {
        return $name;
    }

    public function setName(string $name) {
        $this->name = $name;
    } 

    public function getCost() : float{
        return $cost;
    }   

    public function setCost(float $cost) {
        $this->cost = $cost;
    }
}