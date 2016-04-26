<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/24/2016
 * Time: 8:01 PM
 */

namespace SketchParty;


class SketchController extends Controller {

    public function __construct(Site $site, array $post) {
        parent::__construct($site);

        $title = $_POST['title'];
        $url = $_POST['sketch'];
        $url = str_replace('data:image/png;base64,', '', $url);
        $url = str_replace(' ', '+', $url);
        $data = base64_decode($url);
        $sketch = new Sketch(array('title' => $title, 'image' => $data));

        $sketches = new Sketches($site);
        if($sketches->save($sketch) === null) {
            $this->result = json_encode(array('ok' => false, 'message' => "Upload failed"));
            return;
        }

        $this->result = json_encode(array('ok' => true));
    }
}