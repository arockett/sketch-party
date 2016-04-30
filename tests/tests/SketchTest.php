<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require_once "Empty.php";

use SketchParty\Sketch as Sketch;

class SketchTest extends EmptyTest
{
	public function test_getset() {
        $row = array(
            'title' => "my first sketch",
            'imagefile' => "../images/sketch-party-logo.png"
        );
        $sketch = new Sketch($row);
        $this->assertNull($sketch->getId());
        $this->assertEquals($row['title'], $sketch->getTitle());
        $this->assertEquals($row['imagefile'], $sketch->getImageFilename());

        $row['id'] = 217;
        $sketch = new Sketch($row);
        $this->assertEquals($row['id'], $sketch->getId());
        $this->assertEquals($row['title'], $sketch->getTitle());
        $this->assertEquals($row['imagefile'], $sketch->getImageFilename());
	}
}

/// @endcond
?>
