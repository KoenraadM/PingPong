<?php

namespace spec\PingPong\Game;

use PhpSpec\ObjectBehavior;
use PingPong\Game\Game;
use PingPong\Player\Player;
use PingPong\Team\SingleTeam;
use Prophecy\Argument;

/**
 * Class GameSpec
 * @package spec\PingPong\Game
 * @mixin Game
 */
class NewGameSpec extends ObjectBehavior
{
    private $teamOne;
    private $teamTwo;
    private $playerTommy;
    private $playerDanny;

    function it_is_initializable()
    {
        $this->shouldHaveType('PingPong\Game\NewGame');
    }

    function let()
    {
        $this->playerTommy = new Player('Tommy');
        $this->playerDanny = new Player('Danny');
        $this->teamOne = SingleTeam::withPlayer($this->playerTommy);
        $this->teamTwo = SingleTeam::withPlayer($this->playerDanny);
        $this->beConstructedThrough('withTeams', array($this->teamOne, $this->teamTwo));
    }

    function it_should_give_a_zero_score()
    {
        $this->getScore()->shouldBe([0, 0]);
    }

    function it_should_return_instance_of_team_as_the_serving_team()
    {
        $this->getServingTeam()->shouldBeAnInstanceOf('PingPong\Team\Team');
    }

    function it_should_return_first_team_as_serving_team_by_default()
    {
        $this->getServingTeam()->shouldBe($this->teamOne);
    }

    function it_should_change_serving_team_when_set()
    {
        $this->setServingTeam($this->teamTwo);
        $this->getServingTeam()->shouldBe($this->teamTwo);
    }

    function it_should_throw_exception_if_setting_non_existing_team()
    {
        $player = new player('Natalie');
        $this->shouldThrow('PingPong\Team\InvalidTeamException')->during(
            'setServingTeam',
            [new SingleTeam($player)]
        );
    }

    function it_should_return_open_game_when_started()
    {
        $this->start()->shouldBeAnInstanceOf('PingPong\Game\OpenGame');
    }
}
