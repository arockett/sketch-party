<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/24/2016
 * Time: 8:01 PM
 */

namespace SketchParty;


class SketchController extends Controller {

    const SKETCH_DIR = 'images/sketches/';

    public function __construct(Site $site, array $post) {
        parent::__construct($site);

        // Get post data
        $title = $_POST['title'];
        $url = $_POST['sketch'];

        // Decode image url created by the canvas
        $url = explode(";", $url);
        $extension = explode('/', $url[0])[1];
        $data = str_replace('base64,', '', $url[1]);
        $data = str_replace(' ', '+', $data);
        $data = base64_decode($data);

        // Generate an image file name for the database and for saving
        $sketches = new Sketches($site);
        do {
            $salt = self::randomSalt();
            $filename = self::SKETCH_DIR . $salt . '.' . $extension;
        } while($sketches->exists($filename));
        $savepath = '../' . $filename;

        // Save the image file then add the sketch to the database
        $sketch = new Sketch(array('title' => $title, 'imagefile' => $filename));
        if( !file_put_contents($savepath, $data) or
            $sketches->save($sketch) === null)
        {
            $this->result = json_encode(array('ok' => false, 'message' => "Upload failed"));
            return;
        }

        $this->result = json_encode(array('ok' => true));
    }

    /**
     * Generate a random string of characters for naming sketch image files
     * @param $len int Length to generate, default is 16
     * @returns string Salt string
     */
    public static function randomSalt($len = 8) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }
}