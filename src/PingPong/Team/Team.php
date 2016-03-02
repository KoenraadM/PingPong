<?php

namespace PingPong\Team;

use PingPong\Player\Player;

abstract class Team
{
    /** @var int */
    protected $id;

    /** @var Player[] */
    protected $players;

    /** @var Int */
    protected $score;

    protected $type;

    protected function __construct()
    {
    }

    public function getType()
    {
        return $this->type;
    }

    abstract public function getPlayerCount();

    abstract public function getServingPlayer();

    abstract public function setServingPlayer(Player $player);

    abstract public function switchServingPlayer();

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
