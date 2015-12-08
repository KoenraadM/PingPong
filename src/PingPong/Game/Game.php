<?php

namespace PingPong\Game;

use PingPong\Team\InvalidTeamException;
use PingPong\Team\Team;

class Game
{
    /** @var Team[] */
    private $teams;
    /** @var GameState */
    private $state;
    /** @var Team */
    private $servingTeamKey = 0;

    public static function withTeams(Team $teamOne, Team $teamTwo)
    {
        $game = new Game();
        $game->teams = [$teamOne, $teamTwo];
        $game->state = new OpenGameState();

        return $game;
    }

    public function score(Team $team)
    {
        $this->validateExistingTeam($team);

        if ($this->isFinished()) {
            throw new IllegalActionException('Trying to score on an already finished game.');
        }

        $team->score();

        if ($this->isGameFinished()) {
            $this->state = $this->state->finish();
        }
    }

    public function getScore()
    {
        return [
            $this->teams[0]->getScore(),
            $this->teams[1]->getScore(),
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
        $this->validateExistingTeam($team);
        $this->servingTeamKey = array_search($team, $this->teams);
    }

    protected function isGameFinished()
    {
        return ($this->teams[0]->getScore() > 10 || $this->teams[1]->getScore() > 10) && abs($this->teams[0]->getScore() - $this->teams[1]->getScore()) > 1;
    }

    public function getServingTeam()
    {
        return $this->teams[$this->servingTeamKey];
    }

    private function validateExistingTeam(Team $team)
    {
        if (!in_array($team, $this->teams)) {
            throw new InvalidTeamException('Team does not exist');
        }
    }
}
