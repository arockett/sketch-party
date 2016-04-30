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
        $this->assertEquals("/images/sketches/2GShd459.png", $sketch->getImageFilename());

        $this->assertNull($sketches->get(9));
    }

    public function test_exists() {
        $sketches = new Sketches(self::$site);

        $this->assertTrue($sketches->exists("/images/sketches/2GShd459.png"));
        $this->assertTrue($sketches->exists("/images/sketches/25AB204G.png"));
        $this->assertFalse($sketches->exists("/images/sketches/2a98E473.png"));
    }

    public function test_save() {
        $sketches = new Sketches(self::$site);

        $params = array(
            'title' => "The SketchParty Logo",
            'imagefile' => "/images/sketch-party-logo.png"
        );
        $sketch = new Sketch($params);
        $id = $sketches->save($sketch);

        $new_sketch = $sketches->get($id);
        $this->assertNotNull($new_sketch);
        $this->assertEquals($sketch->getTitle(), $new_sketch->getTitle());
        $this->assertEquals($sketch->getImageFilename(), $new_sketch->getImageFilename());
    }

    public function test_get_random() {
        $sketches = new Sketches(self::$site);

        $params = array(
            'title' => "The SketchParty Logo",
            'imagefile' => "/images/sketch-party-logo.png"
        );
        $sketches->save(new Sketch($params));
        $params['title'] = "Watermelon Duck";
        $params['imagefile'] = "/images/outlines/watermelon-duck-outline.png";
        $sketches->save(new Sketch($params));

        $two = $sketches->getRandom();
        $this->assertEquals(2, count($two));
        $this->assertNotEquals($two[0]->getId(), $two[1]->getId());

        $three = $sketches->getRandom(3);
        $this->assertEquals(3, count($three));

        $more_than_exists = $sketches->getRandom(7);
        $this->assertEquals(4, count($more_than_exists));
    }
}

/// @endcond
?>
