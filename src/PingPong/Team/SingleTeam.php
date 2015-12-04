<?php

namespace PingPong\Team;

use PingPong\Player\Player;

class SingleTeam implements Team
{
    /** @var Player */
    protected $playerOne;

    /** @var Int */
    protected $score;

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
        $team->score = 0;

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

    public function getScore()
    {
        return $this->score;
    }

    public function score()
    {
        $this->score++;
    }
}
