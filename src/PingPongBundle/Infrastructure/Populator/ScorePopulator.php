<?php

namespace PingPongBundle\Infrastructure\Populator;

class ScorePopulator implements Populator
{
    public function populate(array &$target, $source)
    {
        $target['score'] = $source->getScore();
    }
}
