<?php
require 'lib/site.inc.php';
$view = new \SketchParty\HomeView($site);
$view->setTitle("Welcome To SketchParty!")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>
<body>
<div class="content" id="home">

    <?php
    echo $view->header();
    echo $view->present();
    echo $view->footer();
    ?>

</div>
</body>
</html>
