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
        $sketch = $_POST['sketch'];
        $sketch = str_replace('data:image/png;base64,', '', $sketch);
        $sketch = str_replace(' ', '+', $sketch);
        $data = base64_decode($sketch);

        $sketches = new Sketches($site);
        if(!$sketches->saveSketch($title, $data)) {
            $this->result = json_encode(array('ok' => false, 'message' => "Upload failed"));
            return;
        }

        $this->result = json_encode(array('ok' => true));
    }
}