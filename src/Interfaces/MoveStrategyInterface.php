<?php

namespace TicTacToe\Interfaces;

use TicTacToe\Game\Board;

interface MoveStrategyInterface
{
    public function ValutateBoard(Board $board, $marker): array;
    public function MakeMoveInBoard(Board $board, $row, $column, $marker): bool;
}