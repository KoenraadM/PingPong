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
class TeamSpec extends ObjectBehavior
{
    private $playerOne;
    private $playerTwo;

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Team\Team');
    }

    function createOnePlayerTeam()
    {
        $this->playerOne = Player::withName('Tommy');
        $this->beConstructedThrough('withPlayers', [$this->playerOne]);
    }

    function createTwoPlayerTeam()
    {
        $this->playerOne = Player::withName('Tommy');
        $this->playerTwo = Player::withName('Danny');
        $this->beConstructedThrough('withPlayers', [$this->playerOne, $this->playerTwo]);
    }

    function it_should_count_one_for_a_one_player_team()
    {
        $this->createOnePlayerTeam();
        $this->getPlayerCount()->shouldBe(1);
    }

    function it_should_count_two_for_a_two_player_team()
    {
        $this->createTwoPlayerTeam();
        $this->getPlayerCount()->shouldBe(2);
    }

    function it_should_return_player_one_in_single_player_team()
    {
        $this->createOnePlayerTeam();
        $this->getPlayerOne()->shouldBe($this->playerOne);
    }

    function it_should_return_empty_player_two_in_single_player_team()
    {
        $this->createOnePlayerTeam();
        $this->getPlayerTwo()->shouldBe(null);
    }

    function it_should_return_player_one_in_two_player_team()
    {
        $this->createTwoPlayerTeam();
        $this->getPlayerOne()->shouldBe($this->playerOne);
    }

    function it_should_return_player_two_in_two_player_team()
    {
        $this->createTwoPlayerTeam();
        $this->getPlayerTwo()->shouldBe($this->playerTwo);
    }

    function it_should_return_serving_player()
    {
        $this->createTwoPlayerTeam();
        $this->getServingPlayer()->shouldBeAnInstanceOf('PingPong\Player\Player');
    }

    function it_should_set_the_serving_player()
    {
        $this->createTwoPlayerTeam();
        $this->setServingPlayer($this->playerTwo);
        $this->getServingPlayer()->shouldBe($this->playerTwo);
    }

    function it_should_not_be_possible_to_set_an_unknown_player_as_serving_member()
    {
        $this->createOnePlayerTeam();
        $this->shouldThrow('PingPong\Player\InvalidPlayerException')->during('setServingPlayer',
            array(Player::withName('Thomas')));
    }

    function it_should_switch_serving_players_for_single_player_game()
    {
        $this->createOnePlayerTeam();
        $this->switchServingPlayer()->shouldBe($this->playerOne);
        $this->getServingPlayer()->shouldBe($this->playerOne);
    }

    function it_should_switch_serving_players_for_two_player_game()
    {
        $this->createTwoPlayerTeam();
        $this->switchServingPlayer()->shouldBe($this->playerTwo);
        $this->getServingPlayer()->shouldBe($this->playerTwo);
    }

    function it_should_switch_serving_players_sequentially_for_two_player_game()
    {
        $this->createTwoPlayerTeam();
        $this->switchServingPlayer();
        $this->switchServingPlayer();
        $this->getServingPlayer()->shouldBe($this->playerOne);
    }
}
