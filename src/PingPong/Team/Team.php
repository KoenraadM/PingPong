<?php

namespace PingPong\Team;

use PingPong\Player\Player;

interface Team
{
    public function getPlayerCount();

    public function getServingPlayer();

    public function setServingPlayer(Player $player);

    public function switchServingPlayer();

    public function score();

    public function getScore();
}
