<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/24/2016
 * Time: 8:01 PM
 */
require '../lib/site.inc.php';

$controller = new \SketchParty\SketchController($site, $_POST);
echo $controller->getResult();