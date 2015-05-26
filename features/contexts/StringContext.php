<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode,
    AcidSolutions\ValueObjects\Classes\String;


//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class StringContext extends BehatContext
{
    private $String;

    /**
     * @Given /^String:: I have the string "([^"]*)"$/
     */
    public function stringIHaveTheString($arg1)
    {
        $this->String = new String($arg1);
    }

    /**
     * @Then /^String:: I should get "([^"]*)"$/
     */
    public function stringIShouldGet($arg1)
    {
        if ( (string)$this->String !== $arg1)
        {
            throw new Exception("Actual string: $this->String");
        }
    }
}
