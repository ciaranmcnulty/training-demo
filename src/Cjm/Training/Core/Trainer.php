<?php

namespace Cjm\Training\Core;

final class Trainer
{
    private function __construct(
        private string $name
    ){}

    public static function named(string $name) : self
    {
        return new Trainer($name);
    }

    public function getName() : string
    {
        return $this->name;
    }
}
