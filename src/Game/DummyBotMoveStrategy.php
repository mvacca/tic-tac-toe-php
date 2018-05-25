<?php

namespace TicTacToe\Game;

use TicTacToe\Interfaces\MoveStrategyInterface;

class DummyBotMoveStrategy implements MoveStrategyInterface
{
    private function getFreeCells(Board $board) {
        $freeCells = array();
        $boardSize = $board->getSize();
        $boardState= $board->getBoard();

        for($r = 0; $r < $boardSize; $r++) {
            for($c = 0; $c < $boardSize; $c++)
                if ($boardState[$r][$c] == $board::EMPTY_CELL) {
                    array_push($freeCells, array($r,$c));
                }
        }
        return $freeCells;
    }

    public function MakeMoveInBoard(Board $board, $row, $column , $marker): bool
    {
        return $board->set($row,$column,$marker);
    }

    public function ValutateBoard(Board $board, $marker) : array
    {
        $freecells = $this->getFreeCells($board);
        if (empty($freecells))
            return array(-1,-1);

        $random = array_rand($freecells, 1);
        return $freecells[$random];
    }
}