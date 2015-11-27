<?php

namespace PingPong\Game;

class OpenGameState extends AbstractGameState
{
    public function finish()
    {
        return new FinishGameState();
    }
}
