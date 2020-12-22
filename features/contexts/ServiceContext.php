<?php

namespace Cjm\Behat;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Cjm\Training\Application\TrainerDetails;
use Cjm\Training\Application\TrainerRegistration;
use Cjm\Training\Infrastructure\Fake\TrainerDirectory;

class ServiceContext implements Context
{
    private TrainerDetails $trainerDetails;
    private TrainerRegistration $trainerRegistration;

    private string $currentTrainer;

    public function __construct()
    {
        $trainerDirectory = new TrainerDirectory();
        $this->trainerRegistration = new TrainerRegistration($trainerDirectory);
        $this->trainerDetails = new TrainerDetails($trainerDirectory);
    }

    /**
     * @When I create a trainer called :name
     */
    public function createTrainer(string $name)
    {
        $this->currentTrainer = $name;
        $this->trainerRegistration->createTrainer($name);
    }

    /**
     * @Then that trainer should be in the trainer directory
     */
    public function getTrainerDetails()
    {
        $details = $this->trainerDetails->getList();
        assert(count($details) == 1 && current($details) == ['name' => $this->currentTrainer]);
    }
}
