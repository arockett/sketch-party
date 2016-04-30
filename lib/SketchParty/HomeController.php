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
            $sketch_array[] = array('title'=>$sketch->getTitle(), 'path'=>$sketch->getImageFilename());
        }
        $this->result = json_encode(array('ok'=>true, 'sketches'=>$sketch_array));
    }

    private function getNewQuotes(Site $site) {
        
    }
}