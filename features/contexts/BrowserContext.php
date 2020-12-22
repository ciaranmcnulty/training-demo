<?php

namespace Cjm\Behat;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use Behat\Mink\WebAssert;

class BrowserContext implements Context
{
    private string $latestName;

    public function __construct(
        private Mink $mink
    ){}

    /**
     * @When I create a trainer called :name
     */
    public function iCreateATrainerCalled(string $name)
    {
        $this->mink->getSession()->visit('/trainers');
        $this->mink->getSession()->getPage()->fillField('name', $name);
        $this->mink->getSession()->getPage()->pressButton('Add');

        $this->latestName = $name;
    }

    /**
     * @Then that trainer should be in the trainer directory
     */
    public function thatTrainerShouldBeInTheTrainerDirectory()
    {
        $this->mink->getSession()->visit('/trainers');
        $this->mink->assertSession()->elementTextContains('css', '.trainer-list li', $this->latestName);
    }

}
