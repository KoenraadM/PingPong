<?php

namespace PingPong\Player;

class Player
{
    private $name;

    public static function withName($playerName)
    {
        $player = new Player();
        $player->name = $playerName;

        return $player;
    }

    private function __construct()
    {
    }

    public function getName()
    {
        return $this->name;
    }

}
