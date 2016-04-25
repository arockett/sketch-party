<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/24/2016
 * Time: 8:08 PM
 */

namespace SketchParty;


class Sketches extends Table {

    public function __construct(Site $site) {
        parent::__construct($site, "sketch");
    }

    public function saveSketch($title, $img) {
        return true;
    }
}