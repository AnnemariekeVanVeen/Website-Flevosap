<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/**
 * Class AuthController; connects with the authentication view
 */
class AuthController extends BaseController
{
    public $file = './views/auth/';
    public $style = 'src/css/';
    public $status;

    // if a user exist he can login
    public function login()
    {
        $this->file .= 'login.view.php';
        $this->style .= 'login.css';
        $this->render();
    }

    // user and admin can logout
    public function logout()
    {
        $_SESSION = [];
        header('location: index.php?do=default');
        Session::clearFlash();
    }

    //checks if the emails exist and checks the session if the user is admin
    public function check()
    {
        if ($user = UserModel::find_by('email', $_POST['email'])):
            if ($_SESSION['is_admin'] = $user->getIsAdmin()):
                if (password_verify($_POST['password'], $user->getPassword())):
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['first_name'] = $user->getFirstName();
                    $_SESSION['last_name'] = $user->getLastName();
                    $_SESSION['city'] = $user->getCity();
                    $_SESSION['zip_code'] = $user->getZipcode();
                    $_SESSION['street'] = $user->getStreet();
                    $_SESSION['house_number'] = $user->getHousenumber();
                    $_SESSION['login'] = true;
                    $_SESSION['is_admin'] = true;
                    Session::flash('alert', 'Inloggen is succesvol');
                    header('location: index.php?do=adminpage');
                else:
                    Session::flash('alert', 'Inloggen is mislukt');
                    header('location: index.php?do=login');
                endif;
            // checks if the password is valid
            else:
                if (!empty(password_verify($_POST['password'], $user->getPassword()))):
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['first_name'] = $user->getFirstName();
                    $_SESSION['last_name'] = $user->getLastName();
                    $_SESSION['city'] = $user->getCity();
                    $_SESSION['zip_code'] = $user->getZipcode();
                    $_SESSION['street'] = $user->getStreet();
                    $_SESSION['house_number'] = $user->getHousenumber();
                    $_SESSION['login'] = true;
                    $_SESSION['is_admin'] = false;
                    Session::flash('alert', 'Inloggen is succesvol');
                    header('location: index.php?do=default');
                else:
                    Session::flash('alert', 'Inloggen is mislukt');
                    header('location: index.php?do=login');
                endif;
            endif;
        // password is not valid
        else:
            Session::flash('alert', 'Inloggen is mislukt');
            header('location: index.php?do=login');
        endif;
    }

    // registers user
    public function addUser()
    {
        if (UserModel::create($_POST)):
            Session::flash('alert', 'Registratie is succesvol');
            header('location: index.php?do=login');
        // registration is failed
        else:
            Session::flash('alert', 'Registratie is mislukt');
            header('location: index.php?do=registerform');
        endif;
    }

// shows register form
    public function showCreateForm()
    {
        $this->file .= 'registration.view.php';
        $this->style .= 'form.css';
        $this->render();
    }

// user can modify account settings
    public function accountPage()
    {
        if (isset($_POST["email"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["city"]) && isset($_POST["street"]) && isset($_POST["house_number"]) && isset($_POST["zip_code"])) {
            // user model updates account settings
            if ($_SESSION["email"] !== $_POST["email"]) {
                $this->status = "You can only change your own account";
            } else {
                $user = UserModel::find_by('email', $_POST['email']);
                $user->setFirstName($_POST["first_name"]);
                $user->setLastName($_POST["last_name"]);
                $user->setCity($_POST["city"]);
                $user->setStreet($_POST["street"]);
                $user->setHousenumber($_POST["house_number"]);
                $user->setZipcode($_POST["zip_code"]);
                if (isset($_POST["password"]) && !empty($_POST["password"])) {
                    // user model update password
                    $user->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
                }
                //shows that the update is successful
                if ($user->update()) {

                    $_SESSION["first_name"] = $_POST["first_name"];
                    $_SESSION["last_name"] = $_POST["last_name"];
                    $_SESSION["city"] = $_POST["city"];
                    $_SESSION["street"] = $_POST["street"];
                    $_SESSION["house_number"] = $_POST["house_number"];
                    $_SESSION["zip_code"] = $_POST["zip_code"];
                    $this->status = "Wijzigingen succesvol opgeslagen";
                } else {
                    $this->status = "Onbekende fout";
                }
            }
        }

        $this->file .= 'account.view.php';
        $this->style .= 'account.css';
        $this->render();
    }
}
