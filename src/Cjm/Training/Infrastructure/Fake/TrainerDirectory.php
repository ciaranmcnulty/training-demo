<?php

namespace Cjm\Training\Infrastructure\Fake;

use Cjm\Training\Core\Trainer;
use Cjm\Training\Core\TrainerDirectory as TrainerDirectoryInterface;

final class TrainerDirectory implements TrainerDirectoryInterface
{
    private array $trainers;

    public function create(Trainer $trainer): void
    {
        $this->trainers[] = $trainer;
    }

    public function listAll(): array
    {
        return $this->trainers;
    }
}