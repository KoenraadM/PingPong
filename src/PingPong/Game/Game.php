<?php

namespace PingPong\Game;

use PingPong\Player\InvalidAmountOfPlayersException;
use PingPong\Team\Team;

class Game
{
    /** @var  Team */
    private $teamOne;
    /** @var  Team */
    private $teamTwo;
    private $score = [0, 0];
    private $state;

    public static function withTeams(Team $teamOne, Team $teamTwo)
    {
        $game = new Game();
        $game->teamOne = $teamOne;
        $game->teamTwo = $teamTwo;

        $game->state = new OpenGameState();

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

        if (($this->score[0] > 10 || $this->score[1] > 10) && abs($this->score[0] - $this->score[1]) > 1) {
            $this->state = $this->state->finish();
        }
    }

    public function getScore()
    {
        return $this->score;
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
        return $this->teamOne->getPlayerOne();
    }


    public function setServerPlayer(Player $player)
    {
    }
}