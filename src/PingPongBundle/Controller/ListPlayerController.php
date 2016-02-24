<?php

namespace PingPongBundle\Controller;

use PingPongBundle\Player\PlayerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ListPlayerController
{
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function __invoke(Request $request)
    {
        $players = $this->playerRepository->getAll();
        //Todo cannot return arrays as response. Need to plug in transformers.
        return new Response($players);
    }
}
