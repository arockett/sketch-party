<?php
require 'lib/site.inc.php';
$view = new \SketchParty\WelcomeView($site);
$view->setTitle("Welcome To SketchParty!")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>
<body>
<div class="content" id="welcome">

    <?php echo $view->header(); ?>

    <form>
        <p>
            <input type="submit" name="create" value="New Sketch">
            <input type="submit" name="add" value="Add Quote">
        </p>
    </form>

    <div class="double-column">
        <div id="left">
            <p>
                <img src="images/outlines/watermelon-duck-outline.png">
            </p>
            <p>
                <img src="images/outlines/watermelon-duck-outline.png">
            </p>
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
        </div>
    </div>

    <?php echo $view->footer() ?>

</div>
</body>
</html>
