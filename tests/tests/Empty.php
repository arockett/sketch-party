<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require __DIR__ . "/../../vendor/autoload.php";

class EmptyTest extends \PHPUnit_Framework_TestCase
{
	const SEED = 1477563892;

    protected static $site;

    public static function setUpBeforeClass() {
        self::$site = new SketchParty\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

	public function test1() {
		//$this->assertEquals($expected, $actual);
	}
}

/// @endcond
?>
