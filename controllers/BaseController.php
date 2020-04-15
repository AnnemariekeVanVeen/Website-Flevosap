<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/**
 * Class BaseController; connects with the master.php
 */
class BaseController
{
    // shows the layout of master.php
    public function render($data = [], $layout = 'master')
    {
        require './views/layout/' . $layout . '.php';
    }
}
