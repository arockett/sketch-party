<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require_once "Empty.php";

use SketchParty\Quote as Quote;

class QuoteTest extends EmptyTest
{
	public function test_getset() {
        $row = array(
            'source' => "Mark Twain",
            'quote' => "I have never let my schooling interfere with my education."
        );
        $quote = new Quote($row);
        $this->assertNull($quote->getId());
        $this->assertEquals($row['source'], $quote->getSource());
        $this->assertEquals($row['quote'], $quote->getQuote());

        $row['id'] = 4;
        $quote = new Quote($row);
        $this->assertEquals($row['id'], $quote->getId());
        $this->assertEquals($row['source'], $quote->getSource());
        $this->assertEquals($row['quote'], $quote->getQuote());
	}
}

/// @endcond
?>
