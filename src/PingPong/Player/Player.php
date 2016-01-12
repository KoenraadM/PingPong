<?php

namespace PingPong\Player;

class Player
{
    private $id;
    private $name;

    private function __construct()
    {
    }

    public static function withName($playerName)
    {
        $player = new Player();
        $player->name = $playerName;

        return $player;
    }

    public function getName()
    {
        return $this->name;
    }
}
