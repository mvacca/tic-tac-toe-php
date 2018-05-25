<?php

namespace TicTacToe\Game;


class Bot extends Player
{
    public function __construct($marker,$level = "easy")
    {
        parent::__construct($marker, "Bot", BotStrategyFactory::getByLevel($level));
    }

    public function MakeMoveInBoard(Board $board)
    {
        $nextmove = $this->strategy->ValutateBoard($board, $this->getMarker());
        array_push($nextmove, $this->getMarker());
        $row = $nextmove[0];
        $column = $nextmove[1];
        $this->strategy->MakeMoveInBoard($board, $row, $column, $this->getMarker());

        return $nextmove;
    }
}