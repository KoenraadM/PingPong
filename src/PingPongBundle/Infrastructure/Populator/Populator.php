<?php

namespace PingPongBundle\Infrastructure\Populator;

interface Populator
{
    public function populate(array &$target, $source);
}
