<?php

namespace PingPongBundle\Infrastructure\Populator;

class SelfRefPopulator implements Populator
{
    private $urlPart;

    public function __construct($urlPart)
    {
        $this->urlPart = $urlPart;
    }

    public function populate(array &$target, $source)
    {
        $target['meta']['_self'] = $this->urlPart . '/' . $source->getId();
    }
}
