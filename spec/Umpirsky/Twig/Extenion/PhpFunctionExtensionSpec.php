<?php

namespace spec\Umpirsky\Twig\Extenion;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhpFunctionExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Umpirsky\Twig\Extenion\PhpFunctionExtension');
    }

    function it_is_a_Twig_extension()
    {
        $this->shouldHaveType('Twig_Extension');
    }

    function it_provides_floor_php_function()
    {
        $this->run('floor', 4.4)->shouldReturn(4.0);
    }

    function it_provides_ceil_php_function()
    {
        $this->run('ceil', 4.4)->shouldReturn(5.0);
    }

    function it_throws_exception_when_trying_to_call_unexisting_function()
    {
        $this->shouldThrow('BadFunctionCallException')->duringRun('undefinedfunction');
    }

    function it_throws_exception_when_trying_to_call_not_allowed_function()
    {
        $this->shouldThrow('BadFunctionCallException')->duringRun('mail');
    }
}
