<?php

namespace PingPong\Player;

use PingPong\Team\Team;
use Symfony\Component\Validator\Constraints as Assert;

class Player
{
    private $id;
    private $name;
    private $email;
    /** @var Team[] */
    private $teams;

    static public function withName($name)
    {
        $player = new self;
        $player->name = $name;

        return $player;
    }

    private function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \PingPong\Team\Team[]
     */
    public function getTeams()
    {
        return $this->teams;
    }

    public function setTeams($teams)
    {
        $this->teams = $teams;
    }
}
