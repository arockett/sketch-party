<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/30/2016
 * Time: 6:31 PM
 */

namespace SketchParty;


class HomeController extends Controller {

    public function __construct(Site $site, array $post) {
        parent::__construct($site);

        if(isset($post['refresh_sketches'])) {
            $this->getNewSketches($site);
        } else if(isset($post['refresh_quotes'])) {
            $this->getNewQuotes($site);
        } else if(isset($post['create_sketch'])) {
            $this->redirect = $site->getRoot() . '/sketch.php';
        } else if(isset($post['add_quote'])) {
            $this->redirect = $site->getRoot() . '/quote.php';
        }
    }

    private function getNewSketches(Site $site) {
        $table = new Sketches($site);
        $sketches = $table->getRandom();
        if(empty($sketches)) {
            $this->result = json_encode(array('ok'=>false, 'message'=>"Failed to retrieve sketches"));
            return;
        }
        $sketch_array = array();
        foreach($sketches as $sketch) {
            $uri = 'data:image/png;base64,' . base64_encode($sketch->getImage());
            $sketch_array[] = array('title'=>$sketch->getTitle(), 'image'=>$uri);
        }
        $this->result = json_encode(array('ok'=>true, 'sketches'=>$sketch_array));
    }

    private function getNewQuotes(Site $site) {
        $table = new Quotes($site);
        $quotes = $table->getRandom();
        if(empty($quotes)) {
            $this->result = json_encode(array('ok'=>false, 'message'=>"Failed to retrieve quotes"));
            return;
        }
        $quotes_array = array();
        foreach($quotes as $quote) {
            $quotes_array[] = array('source'=>$quote->getSource(), 'quote'=>$quote->getQuote());
        }
        $this->result = json_encode(array('ok'=>true, 'quotes'=>$quotes_array));
    }
}