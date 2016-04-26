<?php

/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */
require_once "EmptyDB.php";

use SketchParty\Quotes as Quotes;
use SketchParty\Quote as Quote;

class QuotesTest extends EmptyDBTest
{
    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/quotes.xml');
    }

    public function test_get() {
        $quotes = new Quotes(self::$site);

        $quote = $quotes->get(5);
        $this->assertEquals("John W. Gardner", $quote->getSource());
        $this->assertEquals("Life is the art of drawing without an eraser.", $quote->getQuote());

        $this->assertNull($quotes->get(7));
    }

    public function test_add() {
        $quotes = new Quotes(self::$site);

        $params = array(
            'source' => "Aaron",
            'quote' => "Please work"
        );
        $quote = new Quote($params);
        $id = $quotes->add($quote);

        $new_quote = $quotes->get($id);
        $this->assertNotNull($new_quote);
        $this->assertEquals($quote->getSource(), $new_quote->getSource());
        $this->assertEquals($quote->getQuote(), $new_quote->getQuote());
    }

    public function test_get_random() {
        $quotes = new Quotes(self::$site);

        $three = $quotes->getRandom();
        $this->assertEquals(3, count($three));
        $this->assertNotEquals($three[0]->getId(), $three[1]->getId());
        $this->assertNotEquals($three[0]->getId(), $three[2]->getId());
        $this->assertNotEquals($three[1]->getId(), $three[2]->getId());

        $two = $quotes->getRandom(2);
        $this->assertEquals(2, count($two));
    }
}

/// @endcond
?>
