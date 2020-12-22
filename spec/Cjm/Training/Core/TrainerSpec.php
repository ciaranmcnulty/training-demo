<?php

namespace spec\Cjm\Training\Core;

use Cjm\Training\Core\Trainer;
use PhpSpec\ObjectBehavior;

class TrainerSpec extends ObjectBehavior
{
    function it_has_a_name()
    {
        $this->beConstructedNamed('Ciaran');
        $this->getName()->shouldBe('Ciaran');
    }
}
