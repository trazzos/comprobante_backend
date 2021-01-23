<?php

namespace Tests;

use Exception;
use Illuminate\Support\Str;

trait ChecksTestEnvironment
{
    public function checkTestEnvironment()
    {
        $this->disableDBIfUnitTest();
        $this->cancelIfOptimized();
    }

    /**
     * Sets a bad DB password if running a unit test
     * This is for when running unit tests from PHPUnit or paratest
     * Paratest sets a bad password for unit tests itself.
     */
    private function disableDBIfUnitTest()
    {
        // Check for --testsuit this happens if you run the Unit test suite from PHPUnit directly
        $key = array_search("--testsuite", $_SERVER["argv"]);
        if ($key !== false)
        {
            if ($_SERVER["argv"][$key+1] === "Unit")
            {
                //Check putenv, might not longer work
                putenv("DB_PASSWORD=POOP");;
                return;
            }
        }

        // Check for tests/Unit in argv - this happens when in PHPStorm you right click a test and press run/debug
        foreach($_SERVER["argv"] as $arg)
        {
            if (Str::contains(strtolower($arg), ["tests/unit"]))
            {
                putenv("DB_PASSWORD=POOP");
                return;
            }
        }
    }

    /**
     * Checks if config.php or routes.php are cached. We don't want to run tests with cached configs to ensure we're not
     * accidentally running with old configs
     * @throws Exception
     */
    private function cancelIfOptimized()
    {
        $laravelBasePath = substr(__FILE__, 0, strpos(__FILE__, "tests/"));
        $configFilePath = $laravelBasePath."bootstrap/cache/config.php";
        $routesFilePath = $laravelBasePath."bootstrap/cache/routes.php";

        if (file_exists($configFilePath) || file_exists($routesFilePath))
        {
            throw new Exception("Please unoptimize/clear caches before running tests");
        }
    }
}
