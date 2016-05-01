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

        // Get post data
        $title = $_POST['title'];
        $uri = $_POST['sketch'];

        // Decode image url created by the canvas
        $uri = explode(";", $uri);
        $type = explode(':', $uri[0])[1];
        if($type != "image/png") {
            $this->result = json_encode(array('ok' => false, 'message' => "Failed to decode image data"));
            return;
        }
        $data = str_replace('base64,', '', $uri[1]);
        $data = str_replace(' ', '+', $data);
        $data = base64_decode($data);

        // Save the image data in the database
        $sketches = new Sketches($site);
        $sketch = new Sketch(array('title' => $title, 'image' => $data));
        if($sketches->save($sketch) === null) {
            $this->result = json_encode(array('ok' => false, 'message' => "Upload failed"));
            return;
        }

        $this->result = json_encode(array('ok' => true));
    }
}