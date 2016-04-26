<?php

/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */
require_once "EmptyDB.php";

use SketchParty\Sketches as Sketches;
use SketchParty\Sketch as Sketch;

class SketchesTest extends EmptyDBTest
{
    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/sketches.xml');
    }

    public function test_get() {
        $sketches = new Sketches(self::$site);

        $sketch = $sketches->get(7);
        $this->assertEquals("An image", $sketch->getTitle());
        $this->assertEquals("9872s398gF7r298735", $sketch->getData());

        $this->assertNull($sketches->get(9));
    }

    public function test_save() {
        $sketches = new Sketches(self::$site);

        $params = array(
            'title' => "The SketchParty Logo",
            'image' => file_get_contents("../images/sketch-party-logo.png")
        );
        $sketch = new Sketch($params);
        $id = $sketches->save($sketch);

        $new_sketch = $sketches->get($id);
        $this->assertNotNull($new_sketch);
        $this->assertEquals($sketch->getTitle(), $new_sketch->getTitle());
        $this->assertEquals($sketch->getData(), $new_sketch->getData());
    }

    public function test_get_random() {
        $sketches = new Sketches(self::$site);

        $params = array(
            'title' => "The SketchParty Logo",
            'image' => file_get_contents("../images/sketch-party-logo.png")
        );
        $sketches->save(new Sketch($params));
        $params['title'] = "Watermelon Duck";
        $params['image'] = file_get_contents("../images/outlines/watermelon-duck-outline.png");
        $sketches->save(new Sketch($params));

        $two = $sketches->getRandom();
        $this->assertEquals(2, count($two));
        $this->assertNotEquals($two[0]->getId(), $two[1]->getId());

        $three = $sketches->getRandom(3);
        $this->assertEquals(3, count($three));
    }
}

/// @endcond
?>
