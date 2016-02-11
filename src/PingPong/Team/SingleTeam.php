<?php

namespace PingPong\Team;

use PingPong\Player\Player;

class SingleTeam extends Team
{
    public static function withPlayer(Player $playerOne)
    {
        $team = new static;
        $team->players = [$playerOne];
        $team->score = 0;

        return $team;
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
