<?php
require_once 'models/user.php';
class userController{

    public $isLoggedIn;


    public function index(){
        echo "User Controller, Action index";
    }

    public function setIsLoggedIn($isLoggedIn){
        $this->isLoggedIn = $isLoggedIn;
    }

    public function getIsLoggedIn(){
        return $this->isLoggedIn;
    }

    public function save(){
        
        if(isset($_POST)){
            $first_name = isset($_POST['first-name-register']) ? $_POST['first-name-register'] : false;
            $last_name = isset($_POST['last-name-register']) ? $_POST['last-name-register'] : false;
            $email = isset($_POST['mail-register']) ? $_POST['mail-register'] : false;
            $password = isset($_POST['password-register']) ? $_POST['password-register'] : false;
            
            if($first_name && $last_name && $email && $password){
                $user = new User();
                $user->setFirst_name($_POST['first-name-register']);
                $user->setLast_name($_POST['last-name-register']);
                $user->setEmail($_POST['mail-register']);
                $user->setPassword($_POST['password-register']);
                $save = $user->save();
                if($save){
                    $_SESSION['register'] = 'completed';
                    require_once 'views_2/user/registerCompleted.php';
                    //echo "Register completed";
                } else{
                    require_once 'views_2/user/registerCompleted.php';
                    $_SESSION['register'] = 'failed';
                }
            } else{
                require_once 'views_2/user/registerCompleted.php';
                $_SESSION['register'] = 'failed';
            }
        } else{
            require_once 'views_2/user/registerCompleted.php';
            $_SESSION['register'] = 'failed';
        }
        exit(header("Location:".base_url));
    }



    public function login() {
        if (isset($_POST)) {
            $user = new User();
            $user->setEmail($_POST['mail-login']);
            $user->setPassword($_POST['password']);

            $identity = $user->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                // Check if "Remember Me" is checked
                if (isset($_POST['remember_me'])) {
                    // Set a cookie with the user's information
                    setcookie('user_email', $_POST['mail-login'], time() + (86400 * 30), "/"); // 86400 = 1 day
                }

                header("Location:".base_url);

                if ($identity->role == 'admin') {
                    $_SESSION['admin'] = true;
                    header("Location:".base_url."category/index");
                }
            } else {
                $_SESSION['error_login'] = 'Identification failed';
                echo 'Identification failed!';
            }
        }
    }



    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);            
        }

        header("Location:".base_url);
    }
} //end of class

// Define routes for UserController
$routes['user'] = array(
    'controller' => 'UserController',
    'action' => 'index'
);

$routes['user/save'] = array(
    'controller' => 'UserController',
    'action' => 'save'
);

$routes['user/login'] = array(
    'controller' => 'UserController',
    'action' => 'login'
);

$routes['user/logout'] = array(
    'controller' => 'UserController',
    'action' => 'logout'
);



