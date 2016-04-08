<?php

namespace PingPongBundle\Player;

interface PlayerRepository
{
    public function find($id);

    public function findAll();

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);

    public function findOneBy(array $criteria);
}
