<?php

namespace PingPongBundle\Controller;

use PingPongBundle\Infrastructure\Populator\Populator;

abstract class ApiContoller
{

    /**
     * @param Populator $populator
     * @param array $sources
     * @return array
     */
    protected function populateResult(Populator $populator, array $sources)
    {
        $result = [];
        foreach ($sources as $source) {
            $target = [];
            $populator->populate($target, $source);
            $result[] = $target;
        }

        return $result;
    }
}
