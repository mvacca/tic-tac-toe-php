<?php

namespace TicTacToe\Game;

class Board
{
    const EMPTY_CELL = '';
    private $boardState = array(array());
    private $boardSize = 3;

    private function initBoard() {
        for($r = 0; $r < $this->boardSize; $r++) {
            for($c = 0; $c < $this->boardSize; $c++)
                $this->boardState[$r][$c] = $this::EMPTY_CELL;
        }
    }

    function __construct($boardSize = 3) {
        $this->boardSize = $boardSize;
        $this->initBoard();
    }

    public function getSize(){
        return $this->boardSize;
    }

    public function get($row, $column) {
        if (isset($this->boardState[$row][$column]) == false)
        {
            return false;
        }
        return $this->boardState[$row][$column];
    }

    public function set($row, $column, $value) {
        $ret = false;
        if (isset($this->boardState[$row][$column])) {
            $this->boardState[$row][$column] = $value;

            $ret = true;
        }
        return $ret;
    }

    public function getBoard(){
        return $this->boardState;
    }

    public function countMarker($marker) {
        $count = 0;
        for($r = 0; $r < $this->boardSize; $r++) {
            for($c = 0; $c < $this->boardSize; $c++)
                if ($this->boardState[$r][$c] == $marker)
                    $count++;
        }
        return $count;
    }
}