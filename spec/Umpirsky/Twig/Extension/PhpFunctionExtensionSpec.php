<?php

namespace spec\Umpirsky\Twig\Extension;

use PhpSpec\ObjectBehavior;
use Twig\Extension\AbstractExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

class PhpFunctionExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PhpFunctionExtension::class);
    }

    function it_is_a_Twig_extension()
    {
        $this->shouldHaveType(AbstractExtension::class);
    }
}
