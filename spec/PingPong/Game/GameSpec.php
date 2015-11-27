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

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Game\Game');
    }

    function let()
    {
        $this->teamOne = Team::withPlayers(Player::withName('Tommy'));
        $this->teamTwo = Team::withPlayers(Player::withName('Danny'));
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
        $this->score($this->teamTwo);
        $this->score($this->teamOne);
        $this->score($this->teamTwo);
        $this->score($this->teamTwo);
        $this->isOpen()->shouldBe(true);
    }
}
