<?php

namespace PingPongBundle\Controller;

use PingPongBundle\Exception\NotFoundException;
use PingPongBundle\Exception\TooManyResultsException;
use PingPongBundle\Player\PlayerRepository;
use Symfony\Component\HttpFoundation\Request;

class PlayerResourceController
{
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function __invoke(Request $request, $uuid)
    {
        $players = $this->playerRepository->findBy(['name' => $uuid]);
        if (count($players) > 1) {
            throw new TooManyResultsException('More than one result was found when looking for the player resource with identifier: ' . $uuid);
        }
        if (count($players) === 0) {
            throw new NotFoundException('No player resource was found with identifier: ' . $uuid);
        }

        return $players[0];
    }
}
