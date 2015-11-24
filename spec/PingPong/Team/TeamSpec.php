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
}
