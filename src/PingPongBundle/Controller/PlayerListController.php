<?php

namespace PingPongBundle\Controller;

use PingPongBundle\Player\PlayerRepository;
use Symfony\Component\HttpFoundation\Request;

class PlayerListController
{
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function __invoke(Request $request)
    {
        $players = $this->playerRepository->findAll();
        return [
            'tralal' => 'lalal',
        ];
    }
}
