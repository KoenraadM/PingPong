<?php

namespace PingPong\Game;

use PingPong\Team\Team;

class Game
{
    /** @var  Team */
    private $teamOne;
    /** @var  Team */
    private $teamTwo;
    private $score = [0, 0];
    private $state;
    private $servingTeam;

    public static function withTeams(Team $teamOne, Team $teamTwo)
    {
        $game = new Game();
        $game->teamOne = $teamOne;
        $game->teamTwo = $teamTwo;
        $game->servingTeam = $teamOne;

        $game->state = new OpenGameState();

        return $game;
    }

    public function score(Team $team)
    {
        if ($team == $this->teamOne) {
            $this->teamOne->score();
        } else {
            $this->teamTwo->score();
        }

        if (($this->teamOne->getScore() > 10 || $this->teamTwo->getScore() > 10) && abs($this->teamOne->getScore() - $this->teamTwo->getScore()) > 1) {
            $this->state = $this->state->finish();
        }
    }

    public function getScore()
    {
        return [
            $this->teamOne->getScore(),
            $this->teamTwo->getScore(),
        ];
    }

    public function isFinished()
    {
        return $this->state instanceof FinishGameState;
    }

    public function isOpen()
    {
        return $this->state instanceof OpenGameState;
    }

    public function getServingPlayer()
    {
        return $this->teamOne->getServingPlayer();
    }

    public function setServingTeam(Team $team)
    {
        $this->servingTeam = $team;
    }
}
