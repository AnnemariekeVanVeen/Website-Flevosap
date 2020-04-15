<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/***
 * Class OrderController; connects with order view
 */
class OrderController extends BaseController
{
    public $file = './views/order/';
    public $style = './src/css/';

    // puts the products from cart into order and checks if you're logged in
    public function order()
    {
        $data['cart'] = WebshopModel::cart($_SESSION['products']);
        $data['user'] = UserModel::find_by('email', $_SESSION['email']);
        $this->file .= "order.view.php";
        $this->style .= "order.css";
        $this->render($data);
    }

    // shows the that the order is successful
    public function finish()
    {
        $data['cart'] = WebshopModel::cart($_SESSION['products']);
        $data['user'] = UserModel::find_by('email', $_SESSION['email']);
        $this->file .= "finish.view.php";
        $this->style .= "finish.css";
        $this->render($data);
    }
}
