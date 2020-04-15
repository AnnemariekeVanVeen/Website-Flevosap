<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/**
 * Class AdminController; connects with admin view
 */
class AdminController extends BaseController
{
    public $file = './views/admin/';
    public $style = 'src/css/';
    public $users;

    // admin can delete user
    public function adminPage()
    {
        if ($_SESSION["is_admin"]) {
            if (isset($_POST["deleteuser"]) && $_POST["deleteuser"] == "Delete" && isset($_POST["id"]) && is_numeric($_POST["id"])) {
                UserModel::destroy($_POST["id"]);
            } else if (isset($_POST["setadmin"]) && isset($_POST["is_admin"]) && isset($_POST["id"]) && is_numeric($_POST["id"])) {
                UserModel::setAdmin($_POST["id"], strtolower($_POST["is_admin"]) !== "true");
            }

            $this->users = UserModel::all();
        } else {
            $this->users = array();
        }

        $this->file .= 'admin.view.php';
        $this->style .= 'account.css';
        $this->render();
    }

    //registers admin
    public function setAdmin()
    {

        if (UserModel::create($_POST)):
            Session::flash('alert', 'Registration successful');
            header('location: index.php?do=login');
        else:
            Session::flash('alert', 'Registration failed');
            header('location: index.php?do=registerform');
        endif;
    }
}
