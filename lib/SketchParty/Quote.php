<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/24/2016
 * Time: 11:17 PM
 */

namespace SketchParty;


class Quote {

    public function __construct($row) {
        if(isset($row['id'])) {
            $this->id = $row['id'];
        }
        $this->source = $row['source'];
        $this->quote = $row['quote'];
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
    public function getSource() {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getQuote() {
        return $this->quote;
    }

    private $id;
    private $source;
    private $quote;
}