<?php

namespace PingPong\Game;

use PingPong\Team\Team;

class Game
{
    /** @var Team[] */
    protected $teams;

    /** @var Integer */
    protected $servingTeamKey = 0;

    public function getScore()
    {
        return [
            $this->teams[0]->getScore(),
            $this->teams[1]->getScore(),
        ];
    }

    public function getServingTeam()
    {
        return $this->teams[$this->servingTeamKey];
    }

    public function getServingPlayer()
    {
        return $this->getServingTeam()->getServingPlayer();
    }
}
