<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 5/1/2016
 * Time: 11:41 AM
 */

namespace SketchParty;


class QuoteController extends Controller {

    public function __construct(Site $site, array $post) {
        parent::__construct($site);

        // Get post data
        $quote = new Quote($post);

        // Add a quote to the database
        $quotes = new Quotes($site);
        if($quotes->add($quote) === 0) {
            $this->result = json_encode(array('ok'=>false, 'message'=>"Failed to add quote"));
            return;
        }

        $this->result = json_encode(array('ok' => true));
    }
}