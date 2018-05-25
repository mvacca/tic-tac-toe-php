<?php

namespace TicTacToe\Game;

class Human extends Player
{
    public function __construct($marker, $name)
    {
        parent::__construct($marker, $name, new HumanMoveStrategy());
    }

    public function MakeMoveInBoard($row, $column,Board $board) {
        return $this->strategy->MakeMoveInBoard($board, $row, $column, $this->getMarker());
    }
}