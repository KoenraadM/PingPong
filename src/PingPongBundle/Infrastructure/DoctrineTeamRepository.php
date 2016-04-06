<?php

namespace PingPongBundle\Infrastructure;

use Doctrine\ORM\EntityRepository;
use PingPong\Player\Player;
use PingPong\Team\SingleTeam;
use PingPongBundle\Team\TeamRepository;

class DoctrineTeamRepository extends EntityRepository implements TeamRepository
{
    public function getAll()
    {
        return $this->findAll();
    }

    Public function createThomas()
    {
        $player = Player::withName('Thomas');
        $team = SingleTeam::withPlayer($player);

        $this->getEntityManager()->persist($player);
        $this->getEntityManager()->persist($team);
        $this->getEntityManager()->flush();
    }
}
