<?php

namespace PingPong;

class Game
{
    public static function withPlayers(array $players)
    {
        if (count($players) == 0) {
            throw new InvalidAmountOfPlayersException();
        }

        $game = new Game();

        // TODO: write logic here

        return $game;
    }

    private function __construct()
    {
    }

}
