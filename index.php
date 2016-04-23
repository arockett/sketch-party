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

<header>
    <img src="images/sketch-party-logo.png">
</header>

<?php echo $view->present(); ?>

<div class="sketch_list">
    <?php echo $view->presentSketchList(); ?>
</div>

<div class="quotes">
    <?php
    $view->addQuote("We all have 10,000 bad drawings in us. The sooner we get them out the better.",
        "Walt Stanchfield");
    $view->addQuote("Life is the art of drawing without an eraser.",
        "John W. Gardner");
    $view->addQuote("If a restaurant offers crayons, I always take them and color throughout the meal. It beats talking to the people I came to dinner with.",
        "Stephan Pastis");
    echo $view->presentQuotes();
    ?>
</div>

<?php echo $view->footer() ?>

</body>
</html>
