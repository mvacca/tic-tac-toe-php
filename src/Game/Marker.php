<?php

namespace TicTacToe\Game;

class Marker
{
    public static function getX() {
        return "X";
    }

    public static function getO() {
        return "O";
    }

    public static function getOpposite($marker) {
        if ($marker == self::getX()) return self::getO();
            else return self::getX();
    }
}