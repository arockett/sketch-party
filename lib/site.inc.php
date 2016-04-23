<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/22/2016
 * Time: 9:36 PM
 */
require __DIR__ . "/../vendor/autoload.php";

// Create and localize the Site object
$site = new \SketchParty\Site();
$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($site);
}