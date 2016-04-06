<?php

namespace PingPongBundle\Infrastructure\Populator;

class NameUpperCasePopulator implements Populator
{
    public function populate(array &$target, $source)
    {
        $target['name'] = strtoupper($source->getName());
    }
}
