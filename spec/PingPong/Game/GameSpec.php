<?php

namespace spec\PingPong\Game;

use PhpSpec\ObjectBehavior;
use PingPong\Game;
use PingPong\Player\Player;
use PingPong\Team\Team;
use Prophecy\Argument;

/**
 * Class GameSpec
 * @package spec\PingPong\Game
 * @mixin Game
 */
class GameSpec extends ObjectBehavior
{
    private $teamOne;
    private $teamTwo;
    private $playerTommy;
    private $playerDanny;

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Game\Game');
    }

    function let()
    {
        $this->playerTommy = Player::withName('Tommy');
        $this->playerDanny = Player::withName('Danny');
        $this->teamOne = Team::withPlayers($this->playerTommy);
        $this->teamTwo = Team::withPlayers($this->playerDanny);
        $this->beConstructedThrough('withTeams', array($this->teamOne, $this->teamTwo));
    }

    function scoreMany($amount, Team $team)
    {
        while ($amount-- > 0) {
            $this->score($team);
        }
    }

    function it_should_give_a_empty_score_with_new_game()
    {
        $this->getScore()->shouldBe([0,0]);
    }

    function it_counts_score_for_perfect_team_one_game()
    {
        $this->scoreMany(11, $this->teamOne);
        $this->getScore()->shouldBe([11,0]);
    }

    function it_counts_score_for_perfect_team_two_game()
    {
        $this->scoreMany(11, $this->teamTwo);
        $this->getScore()->shouldBe([0,11]);
    }

    function it_should_have_an_open_state_when_a_new_game_is_started()
    {
        $this->isOpen()->shouldBe(true);
    }

    function it_should_have_an_finished_state_for_perfect_team_one_game()
    {
        $this->scoreMany(11, $this->teamOne);
        $this->isFinished()->shouldBe(true);
    }

    function it_should_still_have_an_open_state_when_there_is_overtime()
    {
        $this->scoreMany(10, $this->teamOne);
        $this->scoreMany(10, $this->teamTwo);
        $this->score($this->teamOne);
        $this->isOpen()->shouldBe(true);
    }

    function it_should_have_a_finished_state_when_overtime_and_team_one_scores_twice_in_a_row()
    {
        $this->scoreMany(10, $this->teamOne);
        $this->scoreMany(10, $this->teamTwo);
        $this->score($this->teamOne);
        $this->score($this->teamOne);
        $this->isFinished()->shouldBe(true);
    }

    function it_should_return_the_serving_player_with_new_game()
    {
        $this->getServingPlayer()->shouldBeAnInstanceOf('PingPong\Player\Player');
    }

    function it_should_return_the_new_set_serving_team()
    {
        $this->setServingTeam($this->teamOne);
        $this->getServingPlayer()->shouldBe($this->playerTommy);
    }
}
