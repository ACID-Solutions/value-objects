<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode,
    AcidSolutions\ValueObjects\Classes\Decimal;


//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class DecimalContext extends BehatContext
{
    private $Decimal;
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Given /^Decimal:: I have the string "([^"]*)"$/
     **/
    public function decimalIHaveTheString($arg1)
    {
        $this->Decimal = new Decimal($arg1);
    }

    /**
     * @When /^Decimal:: I add "([^"]*)"$/
     **/
    public function decimalIAdd($arg1)
    {
        $this->Decimal->add($arg1);
    }

    /**
     * @Then /^Decimal:: I should get "([^"]*)"$/
     **/
    public function decimalIShouldGet($arg1)
    {
        if ( $this->Decimal->value !== $arg1) {
            throw new Exception("Actual decimal: $this->Decimal");
        }
    }

    /**
     * @Then /^Decimal:: I call toArray and get a valid item$/
     */
    public function decimalICallToarrayAndGetAValidItem()
    {
        $array = $this->Decimal->toArray();

        if ( $array !== $this->Decimal->value )
        {
            throw new Exception("Actual decimal: $this->Decimal");
        }
    }

    /**
     * @Then /^Decimal:: I call toJson and get a valid item$/
     */
    public function decimalICallTojsonAndGetAValidItem()
    {
        $json = $this->Decimal->toJson();

        if ( $json !== json_encode($this->Decimal->value) )
        {
            throw new Exception("Actual decimal: $this->Decimal and json : $json");
        }
    }

    /**
     * @Then /^Decimal:: I check if "([^"]*)" is equal$/
     **/
    public function decimalICheckIfIsEqual($arg1)
    {
        $result = $this->Decimal->isEqualTo($arg1);

        if ( ! $result )
        {
            throw new Exception("It must be equal!");
        }
    }

    /**
     * @Then /^Decimal:: I check if it is positive$/
     **/
    public function decimalICheckIfItIsPositive()
    {
        if ( ! $this->Decimal->isPositive() )
        {
            throw new Exception("It must be positive");
        }
    }
}
