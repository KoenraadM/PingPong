<?php

namespace PingPong\Team;

use PingPong\Player\Player;

class SingleTeam implements Team
{

    protected $playerOne;

    private function __construct()
    {
    }

    /**
     * @param Player $playerOne
     * @return SingleTeam
     */
    public static function withPlayer(Player $playerOne)
    {
        $team = new SingleTeam();
        $team->playerOne = $playerOne;

        return $team;
    }

    public function getPlayerCount()
    {
        return 1;
    }

    public function getServingPlayer()
    {
        return $this->playerOne;
    }

    public function setServingPlayer(Player $player)
    {
        return;
    }

    public function switchServingPlayer()
    {
        return $this->playerOne;
    }
}
