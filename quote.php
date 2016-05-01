<?php
require 'lib/site.inc.php';
$view = new \SketchParty\View($site);
$view->setTitle("Add A Quote");
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $view->head(); ?>
    <script>
        $(document).ready(function() {
            new Quote("form");
        });
    </script>
</head>
<body>
<div class="content" id="quote">
    <?php echo $view->header(); ?>

    <form>
        <p>
            <label for="source">Source:</label>
            <input type="text" id="source" name="source" placeholder="Who said this quote?">
        </p>
        <p>
            <textarea id="quote" name="quote" placeholder="Type the quote"></textarea>
        </p>

        <p>
            <input type="submit" id="add" name="add" value="Add">
            <input type="submit" id="discard" name="discard" value="Discard">
        </p>
        <div id="message"></div>
    </form>

    <?php echo $view->footer(); ?>
</div>
</body>
</html>
