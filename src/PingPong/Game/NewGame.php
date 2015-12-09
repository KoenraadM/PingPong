<?php

namespace PingPong\Game;

use PingPong\Team\InvalidTeamException;
use PingPong\Team\Team;

class NewGame extends Game
{
    public static function withTeams(Team $teamOne, Team $teamTwo)
    {
        $game = new NewGame();
        $game->teams = [$teamOne, $teamTwo];

        return $game;
    }

    public function setServingTeam(Team $team)
    {
        $this->validateExistingTeam($team);
        $this->servingTeamKey = array_search($team, $this->teams);
    }

    private function validateExistingTeam(Team $team)
    {
        if (!in_array($team, $this->teams)) {
            throw new InvalidTeamException('Team does not exist');
        }
    }

    public function start()
    {
        return OpenGame::fromNewGame($this);
    }
}
