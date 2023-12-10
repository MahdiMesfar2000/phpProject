<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Fruitkha, Created by Mahdi Mesfar">

    <style>
        /* Add this style to darken the background when the register section is displayed */
        body.register-open {
            overflow: hidden;
        }

        /* Style for the register section with a white background */
        .register-section {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Add this style to center the register form within the register section */
        .register-form {
            text-align: center;
        }

        /* Add this style to style the close icon in the register box */
        .register-box .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #000; /* Change the color to your preference */
        }

        .login-box,
        .register-box {
            width: 400px; /* Set your desired width */
            margin: auto; /* Center the modal horizontally */
        }

        .sub-menu {
            display: none;
        }

        /* Add this style to show the sub-menu when the user icon is hovered */
        .user-container:hover .sub-menu {
            display: block;
        }
        .hidden {
            display: none;
        }
        /* Style for the login section with a white background */
        .login-section {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Add this style to center the login form within the login section */
        .login-form {
            text-align: center;
        }

        /* Add this style to style the close icon in the login box */
        .login-box .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            color: #000; /* Change the color to your preference */
        }


        /* Add this style to darken the background when the login section is displayed */
        body.login-open {
            overflow: hidden;
        }

        /* Add this style to align the elements and make the welcome text white */
        .header-icons {
            display: flex;
            align-items: center;
        }

        .welcome-text {
            color: white;
            margin: 0 10px; /* Adjust margin as needed */
        }

    </style>

    <!-- title -->
    <title>Fruitkha</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?=base_url?>assets_2/assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/css/responsive.css">

    <link rel="stylesheet" href="<?=base_url?>assets_2/assets/css/customscrollbar.css">

    <!-- ... (your existing code) ... -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const registerForm = document.getElementById('register-form');
            const passwordField = document.getElementById('password-register');
            const confirmPasswordField = document.getElementById('confirm-password-register');
            const errorMessage = document.querySelector('.error-message');

            registerForm.addEventListener('submit', function (event) {
                if (passwordField.value !== confirmPasswordField.value) {
                    errorMessage.textContent = 'Passwords do not match';
                    event.preventDefault(); // Prevent form submission if passwords don't match
                } else {
                    errorMessage.textContent = ''; // Clear the error message
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const userContainer = document.querySelector('.user-container');
            const subMenu = userContainer.querySelector('.sub-menu');

            userContainer.addEventListener('mouseover', function () {
                subMenu.classList.remove('hidden');
            });

            userContainer.addEventListener('mouseout', function () {
                subMenu.classList.add('hidden');
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const loginTrigger = document.querySelector('.login-trigger');
            const loginSection = document.querySelector('.login-section');
            const closeIconLogin = document.querySelector('.login-box .close');
            const registerTrigger = document.querySelector('.register-trigger');
            const registerSection = document.querySelector('.register-section');
            const closeIconRegister = document.querySelector('.register-box .close');
            const body = document.body;

            loginTrigger.addEventListener('click', function () {
                loginSection.classList.remove('hidden');
                body.classList.add('login-open'); // Add the class to darken the background
            });

            closeIconLogin.addEventListener('click', function () {
                loginSection.classList.add('hidden');
                body.classList.remove('login-open'); // Remove the class to restore the background
            });

            registerTrigger.addEventListener('click', function () {
                // Close the login modal if it is open
                if (!loginSection.classList.contains('hidden')) {
                    loginSection.classList.add('hidden');
                    body.classList.remove('login-open');
                }

                registerSection.classList.remove('hidden');
            });

            closeIconRegister.addEventListener('click', function () {
                registerSection.classList.add('hidden');
            });

            // Add the following event listener to handle going back to the login modal from the register modal
            const backToLogin = document.querySelector('.back-to-login');

            backToLogin.addEventListener('click', function () {
                registerSection.classList.add('hidden');
                loginSection.classList.remove('hidden');
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const loginTrigger = document.querySelector('.login-trigger');
            const loginSection = document.querySelector('.login-section');
            const closeIconLogin = document.querySelector('.login-box .close');
            const registerTrigger = document.querySelector('.register-trigger');
            const registerSection = document.querySelector('.register-section');
            const closeIconRegister = document.querySelector('.register-box .close');
            const body = document.body;

            loginTrigger.addEventListener('click', function () {
                loginSection.classList.remove('hidden');
                body.classList.add('login-open'); // Add the class to darken the background
            });

            closeIconLogin.addEventListener('click', function () {
                loginSection.classList.add('hidden');
                body.classList.remove('login-open'); // Remove the class to restore the background
            });

            registerTrigger.addEventListener('click', function () {
                // Close the login modal if it is open
                if (!loginSection.classList.contains('hidden')) {
                    loginSection.classList.add('hidden');
                    body.classList.remove('login-open');
                }

                registerSection.classList.remove('hidden');
            });

            closeIconRegister.addEventListener('click', function () {
                registerSection.classList.add('hidden');
            });
        });
    </script>


</head>
<body>

<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="<?=base_url?>">
                            <img src="<?=base_url?>assets_2/assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li><a href="<?=base_url?>">Home</a></li>
                            <?php
                            $categories = Utils::showCategories();
                            foreach ($categories as $category):
                                ?>
                                <li>
                                    <a href="<?= base_url ?>category/display&id=<?= $category->id; ?>"><?= $category->name ?></a>
                                </li>
                            <?php
                            endforeach;
                            ?>
                            <li>
                                <!-- ... (your existing code) ... -->

                                <div class="header-icons">
                                    <?php if(isset($_SESSION['identity'])): ?>
                                        <h6 class="welcome-text">Welcome, <?=$_SESSION['identity']->first_name?>!</h6>
                                    <div class="user-container">
                                        <a class="user-profile"><i class="far fa-user"></i></a>
                                        <ul class="sub-menu hidden">
                                            <li><a href="<?=base_url?>order/myOrders">My orders</a></li>
                                            <li><a href="<?=base_url?>user/logout">Log out</a></li>
                                        </ul>
                                    </div>
                                    <?php else: ?>
                                        <a class="user-profile login-trigger" href="#"><i class="far fa-user"></i></a>
                                        <!-- Login Modal Trigger -->
                                        <!-- Login Modal -->
                                        <section class="login-section hidden">
                                            <div class="login-container">
                                                <div class="login-box bg-light p-4">
                                                    <i class="close fas fa-times-circle"></i>
                                                    <div class="login-title mb-4">
                                                        <h3>Login:</h3>
                                                    </div>
                                                    <form action="<?=base_url?>user/login" method="POST" id="login-form" class="login-form">
                                                        <div class="form-group">
                                                            <label for="mail-login">Email:</label>
                                                            <input type="email" name="mail-login" id="mail-login" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password:</label>
                                                            <input type="password" name="password" id="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="checkbox" name="remember_me"> Remember Me
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary btn-block" value="Login">
                                                        </div>
                                                    </form>
                                                    <div class="isRegistered">
                                                        <p>Not registered yet?<span class="register-here strong register-trigger"><a style="color: black"> Sign up here!</a></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- Register Modal -->
                                        <section class="register-section hidden">
                                            <div class="register-container">
                                                <div class="register-box bg-light p-4">
                                                    <i class="close fas fa-times-circle"></i>
                                                    <div class="register-title mb-4">
                                                        <h3>Register:</h3>
                                                    </div>
                                                    <form action="<?=base_url?>user/save" method="POST" id="register-form" class="register-form">
                                                        <div class="form-group">
                                                            <label for="first-name-register">First Name:</label>
                                                            <input type="text" name="first-name-register" id="first-name-register" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last-name-register">Last Name:</label>
                                                            <input type="text" name="last-name-register" id="last-name-register" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mail-register">Email:</label>
                                                            <input type="text" name="mail-register" id="mail-register" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password-register">Password:</label>
                                                            <input type="password" name="password-register" id="password-register" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="confirm-password-register">Confirm Password:</label>
                                                            <input type="password" name="confirm-password-register" id="confirm-password-register" class="form-control">
                                                            <span class="error-message" style="color: red;"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary btn-block" value="Sign Up">
                                                        </div>
                                                    </form>
                                                    <div class="back-to-login">
                                                        <p>Already have an account? <span class="login-trigger"><a style="color: black">Login here!</a></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    <?php endif; ?>
                                    <a class="shopping-cart" href="<?=base_url?>cart/index"><i class="fas fa-shopping-cart"></i></a>
                                </div>

                                <!-- ... (your existing code) ... -->

                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input type="text" placeholder="Keywords">
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->
