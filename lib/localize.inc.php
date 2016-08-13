<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/22/2016
 * Time: 6:22 PM
 */

/**
 * Function to localize our site
 * @param $site The Site object
 */
return function(SketchParty\Site $site) {
    // Set the time zone
    date_default_timezone_set('America/Detroit');

    $site->setEmail('aminor65ii@gmail.com');
    $site->setRoot('');

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    $dburl = 'mysql:host=' . $url["host"] . ';dbname=' . $db;

    $site->dbConfigure($dburl, $username, $password, '');
};