<?php

namespace PingPongBundle\Controller;

use PingPongBundle\Infrastructure\Populator\EmailPopulator;
use PingPongBundle\Infrastructure\Populator\NamePopulator;
use PingPongBundle\Infrastructure\Populator\PlayerPopulator;
use PingPongBundle\Infrastructure\Populator\PopulatorChain;
use PingPongBundle\Infrastructure\Populator\ScorePopulator;
use PingPongBundle\Infrastructure\Populator\SelfRefPopulator;
use PingPongBundle\Team\TeamRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ListTeamController extends ApiContoller
{
    private $repository;

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $includes = explode(', ', $request->query->get('include'));
        $populatorChain = $this->buildChain($includes);
        $teams = $this->repository->getAll();
        $result = $this->populateResult($populatorChain, $teams);

        return new JsonResponse($result);
    }

    /**
     * @param array $includes
     * @return PopulatorChain
     */
    private function buildChain(array $includes)
    {
        $populatorChain = new PopulatorChain();
        $populatorChain->chain(new SelfRefPopulator('/teams'));
        $populatorChain->chain(new ScorePopulator());
        if (in_array('players', $includes)) {
            $populatorChain->chain(new PlayerPopulator($this->buildPlayerChain()));
        }

        return $populatorChain;
    }

    /**
     * @return PopulatorChain
     */
    private function buildPlayerChain()
    {
        $populatorChain = new PopulatorChain();
        $populatorChain->chain(new SelfRefPopulator('/players'));
        $populatorChain->chain(new NamePopulator());
        $populatorChain->chain(new EmailPopulator());

        return $populatorChain;
    }
}
