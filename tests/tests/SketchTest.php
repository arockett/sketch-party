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
            'image' => file_get_contents("../images/sketch-party-logo.png")
        );
        $sketch = new Sketch($row);
        $this->assertNull($sketch->getId());
        $this->assertEquals($row['title'], $sketch->getTitle());
        $this->assertEquals($row['image'], $sketch->getImage());

        $row['id'] = 217;
        $sketch = new Sketch($row);
        $this->assertEquals($row['id'], $sketch->getId());
        $this->assertEquals($row['title'], $sketch->getTitle());
        $this->assertEquals($row['image'], $sketch->getImage());
	}
}

/// @endcond
?>
