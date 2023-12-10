<?php
require_once 'models/order.php';
require_once 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
class orderController{

    public function order(){
        require_once 'views_2/order/order.php';
    }

    public function add(){
        if(isset($_SESSION['identity'])){
            $state = isset($_POST['state']) ? $_POST['state'] : false;
            $city = isset($_POST['city']) ? $_POST['city'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;
            $userId = $_SESSION['identity']->id;
            $vals = Utils::valsCart();
            $totalPrice = $vals['total'];

            // Check if any product in the cart has zero stock
            $cart = $_SESSION['cart'];
            $stockEmpty = false;

            foreach ($cart as $index => $value) {
                $product = $value['product'];
                if ($product->stock == 0) {
                    $stockEmpty = true;
                    break;
                }
            }

            // save order in DB if stock is not empty
            if ($state && $city && $address && !$stockEmpty) {
                $order = new Order();
                $order->setState($state);
                $order->setCity($city);
                $order->setAddress($address);
                $order->setUser_id($userId);
                $order->setTotal_price($totalPrice);
                $save = $order->save();

                // save order in ordersProducts table
                $saveOrderProducts = $order->saveOrderProducts();

                if($save && $saveOrderProducts){
                    $_SESSION['cart'] = array();
                    $_SESSION['order'] = "completed";
                } else{
                    $_SESSION['order'] = "failed";
                }
            } else {
                $_SESSION['order'] = $stockEmpty ? "stock_empty" : "failed";
            }
        } else {
            header("Location: ".base_url);
        }

        header("Location: ".base_url."order/confirmed");
    }



    public function confirmed(){
        $order = new Order();
        $lastOrder = $order->getLastOrder();
        require_once 'views_2/order/confirmed.php';
    }


    public function toDownload(){
        $order = new Order();
        $lastOrder = $order->getLastOrder();
        $html2pdf = new Html2Pdf();
        ob_start();
        require_once 'views_2/order/confirmDownload.php';
        $html = ob_get_clean();
        $html2pdf->writeHTML($html);
        ob_end_clean();
        $html2pdf->output();
        unset($_SESSION['cart']);
    }


    public function myOrders(){
       Utils::isLoggedIn();
       $allOrders = new Order();
       $userId = $_SESSION['identity']->id;
       $allOrders->setUser_id($userId);
       $res = $allOrders->getAllByUser();
       require_once 'views_2/order/myOrders.php';
    }


    public function orderDetails() {
        Utils::isLoggedIn();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $userId = $_SESSION['identity']->id;

            $order = new Order();
            $order->setId($id);
            $lastOrder = $order->getSpecificOrder(); // Assuming it returns a single object
            $products = $order->getProductsByOrder();
            $order->setUser_id($userId);

            require_once 'views_2/order/orderDetails.php';
        } else {
            header("Location: " . base_url . "order/myOrders");
        }
    }

    public function orderDetailsAdmin() {
        Utils::isLoggedIn();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $userId = $_SESSION['identity']->id;

            $order = new Order();
            $order->setId($id);
            $lastOrder = $order->getSpecificOrder(); // Assuming it returns a single object
            $products = $order->getProductsByOrder();
            $order->setUser_id($userId);

            require_once 'views_2/order/orderDetailsAdmin.php';
        } else {
            header("Location: " . base_url . "order/myOrders");
        }
    }




    public function manage(){
        Utils::isAdmin();
        $admin = true;

        $order = new Order();
        $res = $order->getAllByUserWithUserInfo(); // Use the new function

        require_once 'views_2/order/myOrders.php';
    }


    public function status(){
        Utils::isAdmin();
        if(isset($_POST['orderId']) && isset($_POST['status'])){
        // Update order
            $order = new Order();
            $order->setId($_POST['orderId']);
            $order->setStatus($_POST['status']);
            $order->update();
            header("Location: ".base_url."order/manage");
        }else{
            header("Location: ".base_url);
        }
    }

}