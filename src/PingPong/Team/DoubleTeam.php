<?php

namespace PingPong\Team;

use PingPong\Player\InvalidPlayerException;
use PingPong\Player\Player;

class DoubleTeam extends SingleTeam
{
    private $servingPlayerKey = 0;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->players = [$playerOne, $playerTwo];
        $this->score = 0;
    }

    public function getPlayerCount()
    {
        return 2;
    }

    public function getServingPlayer()
    {
        return $this->players[$this->servingPlayerKey];
    }

    public function setServingPlayer(Player $player)
    {
        if (!in_array($player, $this->players)) {
            throw new InvalidPlayerException;
        }
        $this->servingPlayerKey = array_search($player, $this->players);
    }

    public function switchServingPlayer()
    {
        $this->servingPlayerKey ^= 1;

        return $this->players[$this->servingPlayerKey];
    }
}
