<?php

namespace PingPongBundle\Infrastructure;

use Doctrine\ORM\EntityRepository;
use PingPongBundle\Player\PlayerRepository;

class DoctrinePlayerRepository extends EntityRepository implements PlayerRepository
{
}
