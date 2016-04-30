<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/24/2016
 * Time: 11:17 PM
 */

namespace SketchParty;


class Sketch {

    public function __construct($row) {
        if(isset($row['id'])) {
            $this->id = $row['id'];
        }
        $this->title = $row['title'];
        $this->imagefile = $row['imagefile'];
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getImageFilename() {
        return $this->imagefile;
    }

    private $id;
    private $title;
    private $imagefile;
}