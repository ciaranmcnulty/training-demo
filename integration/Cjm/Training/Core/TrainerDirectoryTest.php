<?php

namespace Cjm\Training\Core;

use PHPUnit\Framework\TestCase;

abstract class TrainerDirectoryTest extends TestCase
{
    protected \Cjm\Training\Core\TrainerDirectory $directory;

    /** @test */
    function it_can_create_a_trainer()
    {
        $trainer = Trainer::named('Ciaran');

        $this->directory->create($trainer);

        $this->assertEquals([$trainer], $this->directory->listAll());
    }
}