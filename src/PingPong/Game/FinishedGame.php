<?php

namespace PingPong\Game;

use PingPong\Team\Team;

class FinishedGame extends Game
{
    public static function withTeams(Team $teamOne, Team $teamTwo)
    {
        $game = new FinishedGame();
        $game->teams = [$teamOne, $teamTwo];

        return $game;
    }

    public static function fromOpenGame(OpenGame $newGame)
    {
        $game = new FinishedGame();
        $game->teams = $newGame->teams;
        $game->servingTeamKey = $newGame->servingTeamKey;

        return $game;
    }
}
