<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/22/2016
 * Time: 9:43 PM
 */

namespace SketchParty;


class HomeView extends View {

    public function head() {
        $html = parent::head();
        $html .= <<<HTML
<script>
    $(document).ready(function() {
        new SketchFinder("#left");
        new QuoteFinder("#right");
    });
</script>
HTML;

        return $html;
    }

    public function present() {
        $html = <<<HTML
<form>
    <p>
        <input type="submit" name="create" value="Create Sketch">
        <input type="submit" name="add" value="Add Quote">
    </p>
</form>

<div class="double-column">
    <div id="left">
        <div class="sketch">
            <p class="title">Lorem Ipsum</p>
            <p><img src="images/sketch-party-logo.png"></p>
        </div>
        <div class="sketch">
            <p class="title">Lorem Ipsum</p>
            <p><img src="images/sketch-party-logo.png"></p>
        </div>
        <div id="message"></div>
        <p><button id="refresh" type="button">Refresh</button></p>
    </div>

    <div id="right">
        <div class="quote-block">
            <p class="quote">
                "We all have 10,000 bad drawings in us. The sooner
                we get them out the better."
            </p>
            <p class="source">Walt Stanchfield</p>
        </div>
        <div class="quote-block">
            <p class="quote">"Life is the art of drawing without an eraser."</p>
            <p class="source">John W. Gardner</p>
        </div>
        <div class="quote-block">
            <p class="quote">
                "If a restaurant offers crayons, I always take them and color
                throughout the meal. It beats talking to the people I came to
                dinner with."
            </p>
            <p class="source">Stephan Pastis</p>
        </div>
        <div id="message"></div>
        <p><button id="refresh" type="button">Refresh</button></p>
    </div>
</div>
HTML;

        return $html;
    }
}