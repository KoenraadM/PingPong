<?php

namespace PingPong\Game;


abstract class AbstractGameState implements GameState
{
    public function open()
    {
        throw new IllegalStateTransitionException;
    }

    public function finish()
    {
        throw new IllegalStateTransitionException;
    }


}
