<?php

namespace spec\PingPong;

use PhpSpec\ObjectBehavior;
use PingPong\Game;
use Prophecy\Argument;

/**
 * Class GameSpec
 * @package spec\PingPong
 * @mixin Game
 */
class GameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Game');
    }

    function let()
    {
        $this->beConstructedThrough('withPlayers', array());
    }

    public function it_should_throw_exception_when_start_with_zero_players()
    {
        $this->shouldThrow('\InvalidAmountOfPlayersException')->during('withPlayers', array());
    }
}
