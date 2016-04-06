<?php

namespace PingPongBundle\Infrastructure\Populator;

class PlayerPopulator implements Populator
{
    private $playerPopulator;

    public function __construct(Populator $playerPopulator)
    {
        $this->playerPopulator = $playerPopulator;
    }

    public function populate(array &$target, $source)
    {
        //foreach ($source->getServingPlayer() as $source) {
            $player = [];
            $this->playerPopulator->populate($player, $source->getServingPlayer());
            $target['players'][] = $player;
        //}
    }
}
