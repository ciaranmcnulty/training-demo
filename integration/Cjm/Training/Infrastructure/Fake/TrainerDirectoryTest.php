<?php

namespace Cjm\Training\Infrastructure\Fake;

class TrainerDirectoryTest extends \Cjm\Training\Core\TrainerDirectoryTest
{
    function setUp(): void
    {
        $this->directory = new TrainerDirectory();
    }
}