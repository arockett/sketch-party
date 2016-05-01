<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/30/2016
 * Time: 8:35 PM
 */
require '../lib/site.inc.php';

$controller = new \SketchParty\HomeController($site, $_POST);
header('location: ' . $controller->getRedirect());