<?php

namespace spec\PingPong\Team;

use PhpSpec\ObjectBehavior;
use PingPong\Player\Player;
use PingPong\Team\Team;
use Prophecy\Argument;

/**
 * Class TeamSpec
 * @package spec\PingPong\Team
 * @mixin Team
 */
class SingleTeamSpec extends ObjectBehavior
{
    private $playerOne;

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Team\SingleTeam');
    }

    function let()
    {
        $this->playerOne = Player::withName('Tommy');
        $this->beConstructedThrough('withPlayer', [$this->playerOne]);
    }

    function it_should_count_one_for_a_one_player_team()
    {
        $this->getPlayerCount()->shouldBe(1);
    }

    function it_should_return_serving_player()
    {
        $this->getServingPlayer()->shouldBeAnInstanceOf('PingPong\Player\Player');
    }

    function it_should_set_the_serving_player()
    {
        $this->setServingPlayer($this->playerOne);
        $this->getServingPlayer()->shouldBe($this->playerOne);
    }

    function it_should_switch_serving_players_for_single_player_game()
    {
        $this->switchServingPlayer()->shouldBe($this->playerOne);
        $this->getServingPlayer()->shouldBe($this->playerOne);
    }

    function it_should_start_with_score_zero()
    {
        $this->getScore()->shouldbe(0);
    }

    function it_should_add_one_when_scoring()
    {
        $this->score();
        $this->getScore()->shouldBe(1);
    }
}
