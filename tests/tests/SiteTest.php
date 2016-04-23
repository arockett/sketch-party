<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require_once "Empty.php";

class SiteTest extends EmptyTest
{
    public function test_getset() {
        $site = new SketchParty\Site();

        $email = 'becketta@msu.edu';
        $root = 'http://webdev.cse.msu.edu/~becketta/sketch-party/';

        $this->assertNotEquals($email, $site->getEmail());
        $this->assertNotEquals($root, $site->getRoot());

        $site->setEmail($email);
        $site->setRoot($root);

        $this->assertEquals($email, $site->getEmail());
        $this->assertEquals($root, $site->getRoot());
        $this->assertEquals('', $site->getTablePrefix());
    }

    public function test_localize() {
        $site = new SketchParty\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize($site);
        }
        $this->assertEquals('test_sketch_', $site->getTablePrefix());
        $this->assertInstanceOf('\PDO', $site->pdo());
    }
}

/// @endcond
?>
