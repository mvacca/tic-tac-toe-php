<?php

namespace TicTacToe\Services;

use TicTacToe\Game\Game;
use TicTacToe\Interfaces\MoveInterface;

class GameService implements MoveInterface
{
    private $level;
    private $name;

    function __construct($name = 'human', $level = 'easy')
    {
        $this->name =
        $this->level = $level;
    }

    public function makeMove(array $boardState, string $playerUnit): array
    {
        $game = new Game($boardState, $playerUnit,$this->name, $this->level);
        return $game->process();
    }
}