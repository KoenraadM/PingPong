<?php

namespace spec\PingPong\Game;

use PhpSpec\ObjectBehavior;
use PingPong\Game\Game;
use PingPong\Player\Player;
use PingPong\Team\SingleTeam;
use PingPong\Team\Team;
use Prophecy\Argument;

/**
 * Class GameSpec
 * @package spec\PingPong\Game
 * @mixin Game
 */
class OpenGameSpec extends ObjectBehavior
{
    private $teamOne;
    private $teamTwo;
    private $playerTommy;
    private $playerDanny;

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Game\OpenGame');
    }

    function let()
    {
        $this->playerTommy = Player::withName('Tommy');
        $this->playerDanny = Player::withName('Danny');
        $this->teamOne = SingleTeam::withPlayer($this->playerTommy);
        $this->teamTwo = SingleTeam::withPlayer($this->playerDanny);
        $this->beConstructedThrough('withTeams', array($this->teamOne, $this->teamTwo));
    }

    function scoreMany($amount, Team $team)
    {
        $game = $this;
        while ($amount-- > 0) {
            $game = $this->score($team);
        }

        return $game;
    }

    function it_should_give_a_empty_score_with_new_game()
    {
        $this->getScore()->shouldBe([0, 0]);
    }

    function it_counts_score_for_team_one()
    {
        $this->score($this->teamOne);
        $this->getScore()->shouldBe([1, 0]);
    }

    function it_counts_score_for_team_two()
    {
        $this->score($this->teamTwo);
        $this->getScore()->shouldBe([0, 1]);
    }

    function it_counts_score_for_perfect_team_one_game()
    {
        $this->scoreMany(11, $this->teamOne);
        $this->getScore()->shouldBe([11, 0]);
    }

    function it_counts_score_for_perfect_team_two_game()
    {
        $this->scoreMany(11, $this->teamTwo);
        $this->getScore()->shouldBe([0, 11]);
    }

    function it_should_become_a_finished_game_when_game_is_finished()
    {
        $this->scoreMany(11, $this->teamOne)->shouldBeAnInstanceOf('PingPong\Game\FinishedGame');

    }

    function it_should_return_instance_of_finished_game()
    {
        $this->finish()->shouldBeAnInstanceOf('PingPong\Game\FinishedGame');
    }

    function it_should_throw_exception_when_trying_to_score_for_non_existing_team()
    {
        $player = Player::withName('Natalie');
        $this->shouldThrow('PingPong\Team\InvalidTeamException')->during('score',
            [SingleTeam::withPlayer($player)]);
    }

    function it_should_still_have_an_open_state_when_there_is_overtime()
    {
        $this->scoreMany(10, $this->teamOne);
        $this->scoreMany(10, $this->teamTwo);
        $this->score($this->teamOne)->shouldBeAnInstanceOf('PingPong\Game\OpenGame');
    }

    function it_should_have_a_finished_state_when_overtime_and_team_one_scores_twice_in_a_row()
    {
        $this->scoreMany(10, $this->teamOne);
        $this->scoreMany(10, $this->teamTwo);
        $this->score($this->teamOne);
        $this->score($this->teamOne)->shouldBeAnInstanceOf('PingPong\Game\FinishedGame');
    }

    //todo test getServingTeam() function
}
