<?php

namespace PingPong\Team;

use PingPong\Player\Player;

class SingleTeam implements Team
{
    /** @var Player[] */
    protected $players;

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

    public function getScore()
    {
        return $this->score;
    }

    public function score()
    {
        $this->score++;
    }

    public function hasPlayer(Player $player)
    {
        if (!in_array($player, $this->players)) {
            return false;
        }
        return true;
    }
}
