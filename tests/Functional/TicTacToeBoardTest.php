<?php

namespace Tests\Functional;

use TicTacToe\Game\Board;
use TicTacToe\Game\Marker;

class TicTacToeBoardTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructDefaultBoard() {
        $board = new Board();
        $this->assertEquals(3, $board->getSize());
    }

    public function testSetAndGetMarker() {
        $board = new Board();
        $board->set(1,2, Marker::getX());
        $this->assertEquals(Marker::getX(), $board->get(1,2));
    }

    public function testGetOutOfBoardIndex() {
        $board = new Board();
        $this->assertEquals(false, $board->get(1,99));
    }

    public function testSetOutOfBoardIndex() {
        $board = new Board();
        $this->assertEquals(false, $board->set(1,99, Marker::getX()));
    }

    public function testGetBoardState() {
        $expected = array(
            array("X","",""),
            array("","X",""),
            array("","","X")
        );
        $board = new Board();
        $board->set(0,0, Marker::getX());
        $board->set(1,1, Marker::getX());
        $board->set(2,2, Marker::getX());
        $this->assertEquals($expected, $board->getBoard());
    }

    public function testCountMarker() {
        $board = new Board();
        $board->set(1,2, Marker::getX());
        $this->assertEquals(1, $board->countMarker(Marker::getX()));
    }
}
