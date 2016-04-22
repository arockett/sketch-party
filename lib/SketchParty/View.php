<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/22/2016
 * Time: 6:28 PM
 */

namespace SketchParty;


class View {

    /**
     * View constructor.
     * @param Site $site. The Site object
     */
    public function __construct(Site $site) {
        $this->site = $site;
    }

    /**
     * Create the HTML for the contents of the head tag
     * @return string HTML for the page head
     */
    public function head() {
        return <<<HTML
<meta charset="utf-8">
<title>$this->title</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type="text/css" rel="stylesheet" href="css/sketch.css">
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="site.con.js"></script>
HTML;
    }

    /**
     * Create the HTML for the page header
     * @return string HTML for the standard page header
     */
    public function header() {
        $html = <<<HTML
<header>
    <h1>$this->title</h1>
</header>
HTML;
        return $html;
    }

    /**
     * Create the HTML for the page footer
     * @return string HTML for the standard page footer
     */
    public function footer()
    {
        return <<<HTML
<footer>
    <p class="quote">"Life is the art of drawing without an eraser."</p>
    <p class="source">- John W. Gardner</p>
</footer>
HTML;
    }

    /**
     * Set the page title
     * @param $title New page title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get the redirect location link.
     * @return page to redirect to.
     */
    public function getRedirect() {
        return $this->redirect;
    }

    protected $site;        ///< The Site object
    private $title = "";    ///< The page title

    protected $redirect = null; ///< Optional redirect?
}