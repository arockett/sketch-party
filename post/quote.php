<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 5/1/2016
 * Time: 11:41 AM
 */
require '../lib/site.inc.php';

$controller = new \SketchParty\QuoteController($site, $_POST);
echo $controller->getResult();