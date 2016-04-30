<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/30/2016
 * Time: 6:30 PM
 */
require '../lib/site.inc.php';

$controller = new \SketchParty\HomeController($site, $_POST);
echo $controller->getResult();