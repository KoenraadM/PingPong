<?php

namespace PingPongBundle\Infrastructure\Populator;

class PropertyPopulator implements Populator
{
    private $propertyName;

    public function __construct($propertyName)
    {
        $this->propertyName = $propertyName;
    }

    public function populate(array &$target, $source)
    {
        $methodName = 'get' . ucwords($this->propertyName);
        $target[$this->propertyName] = $source->{$methodName}();
    }
}
