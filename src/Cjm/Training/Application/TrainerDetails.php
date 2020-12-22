<?php

namespace Cjm\Training\Application;

use Cjm\Training\Core\TrainerDirectory;

class TrainerDetails
{
    public function __construct(
        public TrainerDirectory $directory
    ){}

    public function getList() : array
    {
        $trainers = $this->directory->listAll();
        return array_map(
            fn($t) => ['name'=>$t->getName()],
            $trainers
        );
    }
}