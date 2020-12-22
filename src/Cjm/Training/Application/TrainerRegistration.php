<?php

namespace Cjm\Training\Application;

use Cjm\Training\Core\Trainer;
use Cjm\Training\Core\TrainerDirectory;

class TrainerRegistration
{
    public function __construct(
        public TrainerDirectory $directory
    ){}

    public function createTrainer(string $name)
    {
        $this->directory->create(Trainer::named($name));
    }
}