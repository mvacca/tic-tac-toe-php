<?php

namespace TicTacToe\Game;

use TicTacToe\Interfaces\MoveStrategyInterface;

abstract class Player
{
    private $marker;
    private $name;
    protected $strategy;

    public function getMarker() {
        return $this->marker;
    }

    public function getName() {
        return $this->name;
    }

    function __construct($marker, $name, MoveStrategyInterface $strategy) {
        $this->marker = $marker;
        $this->name = $name;
        $this->strategy = $strategy;
    }
}