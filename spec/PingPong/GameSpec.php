<?php

namespace spec\PingPong;

use PhpSpec\ObjectBehavior;
use PingPong\Game;
use PingPong\Player\Player;
use PingPong\Team\Team;
use Prophecy\Argument;

/**
 * Class GameSpec
 * @package spec\PingPong
 * @mixin Game
 */
class GameSpec extends ObjectBehavior
{
    private $teamOne;
    private $teamTwo;

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Game');
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
}
