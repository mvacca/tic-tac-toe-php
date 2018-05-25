<?php

namespace Tests\Functional;

use TicTacToe\Game\Board;
use TicTacToe\Game\Bot;
use TicTacToe\Game\Marker;

class TicTacToeDummyBotTest extends \PHPUnit_Framework_TestCase
{
    public function testDummyBotMove() {
        $board = new Board();
        $bot = new Bot(Marker::getX(),"easy");
        $bot->MakeMoveInBoard($board);

        $this->assertEquals(1, $board->countMarker(Marker::getX()));
    }

    public function testFreeMove() {
        $board = new Board();
        $bot = new Bot(Marker::getX(),"easy");
        $board->set(0,0,Marker::getO());
        $board->set(0,1,Marker::getO());
        $board->set(0,2,Marker::getO());
        $board->set(1,0,Marker::getO());
        $board->set(1,1,Marker::getO());
        $board->set(1,2,Marker::getO());
        $board->set(2,0,Marker::getO());
        $board->set(2,2,Marker::getO());
        $bot->MakeMoveInBoard($board);

        $this->assertEquals(Marker::getX(), $board->get(2,1));
    }

    public function testNoMoreMoves() {
        $expected = array(-1,-1,"X");
        $board = new Board();
        $bot = new Bot(Marker::getX(),"easy");
        $board->set(0,0,Marker::getO());
        $board->set(0,1,Marker::getO());
        $board->set(0,2,Marker::getO());
        $board->set(1,0,Marker::getO());
        $board->set(1,1,Marker::getO());
        $board->set(1,2,Marker::getO());
        $board->set(2,0,Marker::getO());
        $board->set(2,1,Marker::getO());
        $board->set(2,2,Marker::getO());
        $nextMove = $bot->MakeMoveInBoard($board);

        $this->assertEquals($expected, $nextMove);
    }
}