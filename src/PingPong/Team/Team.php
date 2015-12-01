<?php

namespace PingPong\Team;

use PingPong\Player\InvalidPlayerException;
use PingPong\Player\Player;

class Team
{
    private $playerOne;
    private $playerTwo;
    private $servingPlayer;

    private function __construct()
    {
    }

    /**
     * @param Player $playerOne
     * @param Player|null $playerTwo
     * @return Team
     */
    public static function withPlayers(Player $playerOne, Player $playerTwo = null)
    {
        $team = new Team();
        $team->playerOne = $playerOne;
        $team->playerTwo = $playerTwo;
        $team->servingPlayer = $playerOne;

        return $team;
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
        return $this->servingPlayer;
    }

    public function setServingPlayer(Player $player)
    {
        if ($player !== $this->playerOne && $player !== $this->playerTwo) {
            throw new InvalidPlayerException;
        }
        $this->servingPlayer = $player;
    }

    public function switchServingPlayer()
    {
        if ($this->servingPlayer === $this->playerOne && $this->playerTwo) {
            $this->servingPlayer = $this->playerTwo;
        } elseif ($this->servingPlayer === $this->playerTwo) {
            $this->servingPlayer = $this->playerOne;
        }

        return $this->servingPlayer;
    }
}
