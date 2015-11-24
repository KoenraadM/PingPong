<?php

namespace PingPong;
use PingPong\Player\InvalidAmountOfPlayersException;
use PingPong\Team\Team;

class Game
{
    private $teamOne;
    private $teamTwo;
    private $score = [0,0];

    public static function withTeams(Team $teamOne, Team $teamTwo)
    {
        $game = new Game();
        $game->teamOne = $teamOne;
        $game->teamTwo = $teamTwo;

        // TODO: write logic here

        return $game;
    }

    private function __construct()
    {
    }

    public function score(Team $team)
    {
        if ($team == $this->teamOne) {
            $this->score[0]++;
        } else {
            $this->score[1]++;
        }
    }

    public function getScore()
    {
        return $this->score;
    }

}