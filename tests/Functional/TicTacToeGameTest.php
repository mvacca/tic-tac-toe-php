<?php

namespace Tests\Functional;

use TicTacToe\Game\Game;
use TicTacToe\Game\Marker;

class TicTacToeGameTest extends \PHPUnit_Framework_TestCase
{
    public function testInitBoard() {
        $expected = array(
            array("X","O","O"),
            array("O","X","X"),
            array("O","X","O")
        );
        $boardState = array("X","O","O","O","X","X","O","X","O");
        $game = new Game($boardState, Marker::getX(),"Marco", "Easy");
        $this->assertEquals($expected, $game->getBoard());
    }

    public function testGameProcess() {
        $boardState = array("X","O","O","O","X","X","O","X","");
        $game = new Game($boardState, Marker::getX(),"Marco", "Easy");
        $game->process();
        $this->assertEquals(Marker::getO(), $game->getBoard()[2][2]);
    }
}
