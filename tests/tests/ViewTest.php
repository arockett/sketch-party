<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require_once "Empty.php";

use SketchParty\View as View;

class ViewTest extends EmptyTest
{
	public function test_construct() {
		$view = new View(self::$site);
        $this->assertInstanceOf('\SketchParty\View', $view);
	}

    public function test_getset() {
        $view = new View(self::$site);
        $this->assertNull($view->getRedirect());
    }

    public function test_head() {
        $view = new View(self::$site);
        $view->setTitle("Lorem ipsum");

        $head = $view->head();
        $this->assertContains('<meta charset="utf-8">', $head);
        $this->assertContains("<title>Lorem ipsum</title>", $head);
        $this->assertContains('<meta name="viewport"', $head);
    }

    public function test_header() {
        $view = new View(self::$site);

        $header = $view->header();
        $this->assertContains("<header>", $header);
    }

    public function test_footer() {
        $view = new View(self::$site);

        $footer = $view->footer();
        $this->assertContains("<footer>", $footer);
    }
}

/// @endcond
?>
