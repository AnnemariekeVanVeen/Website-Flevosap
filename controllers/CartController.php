<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/***
 * Class CartController; connects with the cart view
 */
class CartController extends BaseController
{
    public $file = './views/cart/';
    public $style = '/src/css/';

    //shows layout of the cart
    public function index()
    {
        if (!empty($_SESSION['products'])) {
            $data['cart'] = WebshopModel::cart($_SESSION['products']);
            $this->file .= "cart.view.php";
            $this->style .= "cart.css";
            $this->render($data);
        } else {
            $this->file .= "cart.view.php";
            $this->style .= "cart.css";
            $this->render();
        }
    }

    // shows products, price, quantity and total price of products
    public function insert()
    {
        $_SESSION['products'][$_POST['product_id']] = $_POST['quantity'];
        $_SESSION['total'][$_POST['product_id']] = WebshopModel::total($_POST['product_id'], $_POST['quantity']);
        header('location: index.php?do=cart');
    }

    // clears cart
    public function deleteAll()
    {
        $_SESSION['products'] = [];
        $_SESSION['total'] = [];
        header('location: index.php?do=cart');
    }
}
