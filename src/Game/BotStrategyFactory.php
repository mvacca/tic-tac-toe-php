<?php

namespace TicTacToe\Game;

/*
 *  This Factory can instance a different bot strategy class by the difficulty level.
 *  It's possible create more smart Bot algorithm. At the moment exist just the dummy bot ;)
 */

class BotStrategyFactory
{
    public static function getByLevel($level) {
        switch ($level) {
            case "hard":
                return new DummyBotMoveStrategy();
                break;
            case "medium":
                return new DummyBotMoveStrategy();
                break;
            default:
                return new DummyBotMoveStrategy();
        }
    }
}