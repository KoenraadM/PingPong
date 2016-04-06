<?php

namespace PingPongBundle\Controller;

use PingPongBundle\Infrastructure\Populator\EmailPopulator;
use PingPongBundle\Infrastructure\Populator\NameUpperCasePopulator;
use PingPongBundle\Infrastructure\Populator\PopulatorChain;
use PingPongBundle\Infrastructure\Populator\PropertyPopulator;
use PingPongBundle\Infrastructure\Populator\SelfRefPopulator;
use PingPongBundle\Player\PlayerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ListPlayerController extends ApiContoller
{
    private $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function __invoke(Request $request)
    {
        $upper = $request->query->get('upper');
        $populatorChain = $this->buildChain($upper);
        $players = $this->playerRepository->getAll();
        $result = $this->populateResult($populatorChain, $players);

        return new JsonResponse($result);
    }

    /**
     * @param $upper
     * @return PopulatorChain
     */
    private function buildChain($upper)
    {
        $populatorChain = new PopulatorChain();
        $populatorChain->chain(new SelfRefPopulator('/players'));
        //$populatorChain->chain(new NamePopulator());
        $populatorChain->chain(new PropertyPopulator('name'));
        if (!is_null($upper)) {
            $populatorChain->chain(new NameUpperCasePopulator());
        }
        $populatorChain->chain(new EmailPopulator());

        return $populatorChain;
    }
}
