<?php

namespace PingPongBundle\Infrastructure\Populator;

class EmailPopulator implements Populator
{
    public function populate(array &$target, $source)
    {
        $target['email'] = strtoupper($source->getEmail());
    }
}
