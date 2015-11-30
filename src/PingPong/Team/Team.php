<?php

namespace PingPong\Team;

use PingPong\Player\Player;

class Team
{
    private $playerOne;
    private $playerTwo;

    /**
     * @param array $players
     * @return Team
     */
    public static function withPlayers(Player $playerOne, Player $playerTwo = null)
    {
        $team = new Team();
        $team->playerOne = $playerOne;
        $team->playerTwo = $playerTwo;

        // TODO: write logic here

        return $team;
    }

    private function __construct()
    {
    }

    public function getPlayerCount()
    {
        return $this->playerTwo ? 2 : 1;
    }

    public function getPlayerOne()
    {
        return $this->playerOne;
    }

    public function getPlayerTwo()
    {
        return $this->playerTwo;
    }

    public function getServingPlayer()
    {
        // TODO: write logic here
    }
}