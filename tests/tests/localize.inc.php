<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/22/2016
 * Time: 6:19 PM
 */

/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(SketchParty\Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');

    $site->setEmail('aminor65ii@gmail.com');
    $site->setRoot('.');
    $site->dbConfigure('mysql:host=mysql-user.cse.msu.edu;dbname=becketta',
        'becketta',         // Database user
        'nodatasetforyou',  // Database password
        'test_sketch_');    // Table prefix
};