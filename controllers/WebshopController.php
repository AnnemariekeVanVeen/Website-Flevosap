<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/**
 * The webshop controller handles product CRUD operations.
 */
class WebshopController extends BaseController
{
    // Selects the right view to render.
    public $file = './views/webshop/';

    // Selects the right style to be used on the view.
    public $style = './src/css/';


    // Index page
    public function index()
    {
        $data['webshop'] = WebshopModel::all();
        $this->file .= "webshop.view.php";
        $this->style .= "webshop.css";
        $this->render($data);
    }

    /**
     * Product overview.
     * Also used for deleting and adding products.
     */
    public function juices()
    {
        // Delete a product by id.
        if (isset($_POST["delete"]) && isset($_POST["id"]) && is_numeric($_POST["id"])) {
            if (WebshopModel::destroy($_POST["id"])):
                Session::flash('alert', 'Product verwijdert');
            else:
                Session::flash('alert', 'Product verwijderen is mislukt');
            endif;
        } // Creates a new product.
        else if (isset($_POST["create"])) {

            $target_dir = "src/img/juices/";
            $target_file = $target_dir . basename($_FILES["image_upload"]["name"]);

            // UploadOk goes to 0 on an upload error
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image_upload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                Session::flash('alert', "File is not an image.");
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                Session::flash('alert', "Sorry, file already exists.");
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
                Session::flash('alert', "Sorry, only JPG & JPEG files are allowed.");
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk === 1) {
                if (move_uploaded_file($_FILES["image_upload"]["tmp_name"], $target_file)) {
                    $_POST["image"] = basename($_FILES["image_upload"]["name"]);
                } else {
                    Session::flash('alert', "Sorry, there was an error uploading your file.");
                    $uploadOk = 0;
                }
            }
            // confirms that product is added
            if ($uploadOk === 1) {
                if (WebshopModel::create($_POST)):
                    Session::flash('alert', 'Product toegevoegd');
                else:
                    Session::flash('alert', 'Product toevoegen is mislukt');
                endif;
            }
        }

        $this->file .= "webshop.view.php";
        $this->style .= "webshop.css";

        // Filter function; filters the veggie and fruit juice category
        if (isset($_GET['veggie_juice']) && isset($_GET['fruit_juice'])):
            $groentesappen = WebshopModel::find_by('category', 'groentesappen');
            $fruitsappen = WebshopModel::find_by('category', 'fruitsappen');
            $data['juices'] = array_merge_recursive($groentesappen, $fruitsappen);
            $this->render($data);
        elseif (isset($_GET['veggie_juice'])):
            $data['juices'] = WebshopModel::find_by('category', 'groentesappen');
            $this->render($data);
        elseif (isset($_GET['fruit_juice'])):
            $data['juices'] = WebshopModel::find_by('category', 'fruitsappen');
            $this->render($data);
        else:
            $groentesappen = WebshopModel::find_by('category', 'groentesappen');
            $fruitsappen = WebshopModel::find_by('category', 'fruitsappen');
            $data['juices'] = array_merge_recursive($groentesappen, $fruitsappen);
            $this->render($data);
        endif;
    }


    // Showing the horeca products
    public function horeca()
    {
        $data['horeca'] = WebshopModel::find_by('category', 'horeca');
        $this->file .= "horeca.view.php";
        $this->style .= "webshop.css";
        $this->render($data);
    }
}
