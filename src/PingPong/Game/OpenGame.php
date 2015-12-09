<?php

namespace PingPong\Game;

use PingPong\Team\InvalidTeamException;
use PingPong\Team\Team;

class OpenGame extends Game
{
    public static function withTeams(Team $teamOne, Team $teamTwo)
    {
        $game = new OpenGame();
        $game->teams = [$teamOne, $teamTwo];

        return $game;
    }

    public static function fromNewGame(NewGame $newGame)
    {
        $game = new OpenGame();
        $game->teams = $newGame->teams;
        $game->servingTeamKey = $newGame->servingTeamKey;

        return $game;
    }

    public function score(Team $team)
    {
        $this->validateExistingTeam($team);
        $team->score();

        if ($this->isGameFinished()) {
            return $this->finish();
        }

        return $this;
    }

    protected function isGameFinished()
    {
        return ($this->teams[0]->getScore() > 10 || $this->teams[1]->getScore() > 10) && abs($this->teams[0]->getScore() - $this->teams[1]->getScore()) > 1;
    }

    public function finish()
    {
        return FinishedGame::fromOpenGame($this);
    }

    private function validateExistingTeam(Team $team)
    {
        if (!in_array($team, $this->teams)) {
            throw new InvalidTeamException('Team does not exist');
        }
    }
}
