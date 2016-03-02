<?php

namespace spec\PingPong\Team;

use PhpSpec\ObjectBehavior;
use PingPong\Player\Player;
use PingPong\Team\SingleTeam;
use Prophecy\Argument;

/**
 * Class TeamSpec
 * @package spec\PingPong\Team
 * @mixin SingleTeam
 */
class SingleTeamSpec extends ObjectBehavior
{
    private $player;
    private $spectator;

    function let()
    {
        $this->player = Player::withName('Tommy');
        $this->spectator = Player::withName('Mathieu');
        $this->beConstructedThrough('withPlayer', [$this->player]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Team\SingleTeam');
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
        $this->setServingPlayer($this->player);
        $this->getServingPlayer()->shouldBe($this->player);
    }

    function it_should_switch_serving_players_for_single_player_game()
    {
        $this->switchServingPlayer()->shouldBe($this->player);
        $this->getServingPlayer()->shouldBe($this->player);
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

    function it_should_return_true_if_the_given_player_exists()
    {
        $this->hasPlayer($this->player)->shouldBe(true);
    }

    function it_should_return_false_if_the_given_player_doesnt_exists()
    {
        $this->hasPlayer($this->spectator)->shouldBe(false);
    }
}
