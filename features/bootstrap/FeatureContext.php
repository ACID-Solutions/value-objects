<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // import all context classes from context directory, except the abstract one

        $filesToSkip = array('AbstractContext.php');

        $path = dirname(__FILE__) . '/../contexts/';
        $it = new RecursiveDirectoryIterator($path);
        /** @var $file  SplFileInfo */
        foreach ($it as $file) {
            if (!$file->isDir()) {
               $name = $file->getFilename();
               if (!in_array($name, $filesToSkip)) {
                   $class = pathinfo($name, PATHINFO_FILENAME);
                   require_once dirname(__FILE__) . '/../contexts/' . $name;
                   $this->useContext($class, new $class($parameters));
               }
            }
        }
    }
}
