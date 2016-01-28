<?php

namespace spec\PingPong\Player;

use PhpSpec\ObjectBehavior;
use PingPong\Player\Player;
use Prophecy\Argument;

/**
 * Class PlayerSpec
 * @package spec\PingPong
 * @mixin Player
 */
class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('Tommy');
        $this->shouldHaveType('PingPong\Player\Player');
    }

    function it_should_return_player_name()
    {
        $this->beConstructedWith('Tommy');
        $this->getName()->shouldBeLike('Tommy');
    }

    function it_should_return_correct_player_name()
    {
        $this->beConstructedWith('Danny');
        $this->getName()->shouldBeLike('Danny');
    }
}
