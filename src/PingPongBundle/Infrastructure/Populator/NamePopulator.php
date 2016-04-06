<?php

namespace PingPongBundle\Infrastructure\Populator;

class NamePopulator implements Populator
{
    public function populate(array &$target, $source)
    {
        $target['name'] = $source->getName();
    }
}
