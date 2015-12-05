<?php

namespace PingPong\Game;

interface GameState
{
    public function open();

    public function finish();
}
