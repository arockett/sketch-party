<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require_once "Empty.php";

use SketchParty\Controller as Controller;

class ControllerTest extends EmptyTest
{
	public function test_construct() {
		$controller = new Controller(self::$site);
        $this->assertInstanceOf('\SketchParty\Controller', $controller);
	}

    public function test_getset() {
        $controller = new Controller(self::$site);
        $this->assertNull($controller->getRedirect());
        $this->assertNull($controller->getResult());
    }
}

/// @endcond
?>
