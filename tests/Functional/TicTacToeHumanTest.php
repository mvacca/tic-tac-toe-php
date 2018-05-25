<?php

namespace Tests\Functional;

use TicTacToe\Game\Board;
use TicTacToe\Game\Human;
use TicTacToe\Game\Marker;

class TicTacToeHumanTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructMarkerHumanPlayer() {
        $human = new Human(Marker::getX(),"Marco");
        $this->assertEquals(Marker::getX(), $human->getMarker());
    }

    public function testConstructNameHumanPlayer() {
        $human = new Human(Marker::getX(),"Marco");
        $this->assertEquals("Marco", $human->getName());
    }

    public function testHumanPlayerMove() {
        $board = new Board();
        $human = new Human(Marker::getX(),"Marco");
        $human->MakeMoveInBoard(0,0, $board);
        $this->assertEquals(Marker::getX(), $board->get(0,0));
    }
}