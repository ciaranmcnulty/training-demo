<?php

namespace Cjm\Training\Core;

interface TrainerDirectory
{
    public function create(Trainer $trainer) : void;

    /** @return Trainer[] */
    public function listAll() : array;
}