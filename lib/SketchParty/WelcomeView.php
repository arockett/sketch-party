<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/22/2016
 * Time: 9:43 PM
 */

namespace SketchParty;


class WelcomeView extends View {

    public function present() {
        $html = <<<HTML

HTML;

        return $html;
    }

    public function presentQuotes() {
        $html = "";

        foreach($this->quotes as $quote) {
            $text = $quote['quote'];
            $by = $quote['source'];
            $html .= <<<HTML
<div class="quote_block">
<p class="quote">$text</p>
<p class="source">$by</p>
</div>
HTML;
        }

        return $html;
    }

    public function addQuote($quote, $source) {
        $this->quotes[] = array('quote' => $quote, 'source' => $source);
    }

    private $quotes = array();
}