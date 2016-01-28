<?php

namespace PingPong\Team;

use PingPong\Player\Player;

class SingleTeam extends Team
{
    public function __construct(Player $playerOne)
    {
        $this->players = [$playerOne];
        $this->score = 0;
    }

    public function getPlayerCount()
    {
        return 1;
    }

    public function getServingPlayer()
    {
        return $this->players[0];
    }

    public function setServingPlayer(Player $player)
    {
        return;
    }

    public function switchServingPlayer()
    {
        return $this->players[0];
    }
}
