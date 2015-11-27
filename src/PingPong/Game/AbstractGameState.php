<?php
/**
 * Created by PhpStorm.
 * User: hansstevens
 * Date: 27/11/15
 * Time: 12:37
 */

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
