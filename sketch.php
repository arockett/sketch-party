<?php
require 'lib/site.inc.php';
$view = new \SketchParty\View($site);
$view->setTitle("Create A Sketch")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
    <!--[if IE]>
    <script src="ie-canvas.js"></script>
    <![endif]-->
    <script>
        $(document).ready(function() {
            drawingApp.init();
            new Sketch("form");
        });
    </script>
</head>
<body>
<div class="content" id="sketch">

    <?php echo $view->header(); ?>

    <form>
        <p>
            <label for="title">Title: </label>
            <input type="text" id="title" name="title" placeholder="Give your sketch a title..." maxlength="100">
        </p>
        <p>
            <label for="outline">Template: </label>
            <select name="outline">
                <option value="duck">Watermelon Duck</option>
            </select>
        </p>

        <div id="app">
            <div id="canvasDiv"></div>
        </div>

        <p>
            <input type="submit" id="save" name="save" value="Save">
            <input type="submit" id="discard" name="discard" value="Discard">
        </p>
        <div class="message"></div>
    </form>

    <?php echo $view->footer() ?>

</div>
</body>
</html>