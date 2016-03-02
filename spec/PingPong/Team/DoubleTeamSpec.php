<?php

namespace spec\PingPong\Team;

use PhpSpec\ObjectBehavior;
use PingPong\Player\Player;
use PingPong\Team\DoubleTeam;
use Prophecy\Argument;

/**
 * Class TeamSpec
 * @package spec\PingPong\Team
 * @mixin DoubleTeam
 */
class DoubleTeamSpec extends ObjectBehavior
{
    private $playerOne;
    private $playerTwo;

    function let()
    {
        $this->playerOne = Player::withName('Tommy');
        $this->playerTwo = Player::withName('Danny');
        $this->beConstructedThrough('withPlayers', [$this->playerOne, $this->playerTwo]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Team\Team');
    }

    function it_should_count_two_for_player_count()
    {
        $this->getPlayerCount()->shouldBe(2);
    }

    function it_should_return_a_player_instance_for_serving_player()
    {
        $this->getServingPlayer()->shouldBeAnInstanceOf('PingPong\Player\Player');
    }

    function it_should_set_the_first_given_player_as_serving_player()
    {
        $this->getServingPlayer()->shouldBe($this->playerOne);
    }

    function it_should_set_the_serving_player()
    {
        $this->setServingPlayer($this->playerTwo);
        $this->getServingPlayer()->shouldBe($this->playerTwo);
    }

    function it_should_not_be_possible_to_set_an_unknown_player_as_serving_member()
    {
        $player = Player::withName('Thomas');
        $this->shouldThrow('PingPong\Player\InvalidPlayerException')->during('setServingPlayer',
            array($player));
    }

    function it_should_switch_serving_players_for_two_player_game()
    {
        $this->switchServingPlayer()->shouldBe($this->playerTwo);
        $this->getServingPlayer()->shouldBe($this->playerTwo);
    }

    function it_should_switch_serving_players_sequentially_for_two_player_game()
    {
        $this->switchServingPlayer();
        $this->switchServingPlayer();
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
