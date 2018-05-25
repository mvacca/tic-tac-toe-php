<?php

namespace TicTacToe\Game;

use TicTacToe\Interfaces\MoveStrategyInterface;

class HumanMoveStrategy implements MoveStrategyInterface
{
    public function MakeMoveInBoard(Board $board, $row, $column , $marker): bool
    {
        return $board->set($row,$column,$marker);
    }

    public function ValutateBoard(Board $board, $marker): array
    {
        return null;
    }
}