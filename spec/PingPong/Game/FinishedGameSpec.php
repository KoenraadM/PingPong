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
class FinishedGameSpec extends ObjectBehavior
{
    private $teamOne;
    private $teamTwo;
    private $playerTommy;
    private $playerDanny;

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Game\FinishedGame');
    }

    function let()
    {
        $this->playerTommy = new Player('Tommy');
        $this->playerDanny = new Player('Danny');
        $this->teamOne = SingleTeam::withPlayer($this->playerTommy);
        $this->teamTwo = SingleTeam::withPlayer($this->playerDanny);
        $this->beConstructedThrough('withTeams', array($this->teamOne, $this->teamTwo));
    }

    //todo test getScore() function

    function it_should_return_the_serving_team_with_new_game()
    {
        $this->getServingTeam()->shouldBeAnInstanceOf('PingPong\Team\Team');
    }

    //todo test getServingPlayer() function
}
