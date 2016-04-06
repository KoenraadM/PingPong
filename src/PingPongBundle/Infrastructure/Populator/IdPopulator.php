<?php

namespace PingPongBundle\Infrastructure\Populator;

class IdPopulator implements Populator
{
    public function populate(array &$target, $source)
    {
        $target['id'] = $source->getId();
    }
}
