<?php

namespace PingPongBundle\Infrastructure\Populator;

class PopulatorChain implements Populator
{
    /** @var Populator[] */
    private $chain = [];

    public function chain(Populator $populator)
    {
        $this->chain[] = $populator;

        return $this;
    }

    public function populate(array &$target, $source)
    {
        foreach ($this->chain as $populator) {
            $populator->populate($target, $source);
        }
    }
}

