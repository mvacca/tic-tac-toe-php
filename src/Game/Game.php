<?php

namespace TicTacToe\Game;

class Game
{
    private $board;
    private $human;
    private $bot;

    function __construct($boardState,$playerUnit,$name,$level)
    {
        $this->board = new Board();
        $this->initBoard($boardState);
        $this->human = new Human($playerUnit, $name);
        $this->bot = new Bot(Marker::getOpposite($playerUnit),$level);
    }

    private function initBoard($boardState){
        $size =  $this->board->getSize();
        $boardStateReverse = array_reverse($boardState);

        for($r = 0; $r < $size; $r++) {
            for($c = 0; $c < $size; $c++)
                $this->board->set($r,$c,array_pop($boardStateReverse));
        }
    }

    public function process() {
        return $this->bot->MakeMoveInBoard($this->board);
    }

    public function getBoard() {
        return $this->board->getBoard();
    }
}