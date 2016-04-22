<?php
/**
 * Created by PhpStorm.
 * User: Aaron Beckett
 * Date: 4/22/2016
 * Time: 6:28 PM
 */

namespace SketchParty;


class Controller {

    /**
     * Controller constructor.
     * @param Site $site The Site object
     */
    public function __construct(Site $site) {
        $this->site = $site;
    }

    /**
     * Get the redirect location link.
     * @return page to redirect to.
     */
    public function getRedirect() {
        return $this->redirect;
    }

    /**
     * Get any AJAX response
     * @return JSON result for AJAX
     */
    public function getResult() {
        return $this->result;
    }

    protected $redirect;		///< Page we will redirect the user to.
    protected $result = null;	///< Result for AJAX operations

    protected $site;			///< The Site object
}