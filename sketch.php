<?php
require 'lib/site.inc.php';
$view = new \SketchParty\View($site);
$view->setTitle("Create A Sketch")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>
<body>

<?php echo $view->header(); ?>

<div id="canvasDiv"></div>
<!--[if IE]>
<script src="ie-canvas.js"></script>
<![endif]-->
<script src="site.con.js"></script>
<script>
    drawingApp.init();
</script>

<?php echo $view->footer() ?>

</body>
</html>