<?php
require_once "config.php";
require_once "sessopm .php";

if($_SERVER("REQUEST_METHOD") == "POST" &&isset($_POST['submit'])) {

    $fullname=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $confirm_password=trim($_POST['confirm_password']);
    $password_hash=password_hash($password, PASSWORD_BCRYPT);

    if($query == $db->prepare("SELECT * FROM users WHERE email=?")){
        $error='';
    }
    $query->bind_param('s',$email);
    $query->execute();
    $query->store_result();
    if ($query->num_rows>0) {
        $error.='<p class="error">The email address is already registered!</p>';
    }else {
        if (strlen($password)<8) {
            # code...
            $error .= '<p class="error">Password must have atleast 8 characters</p>'; 
        }

        
        if (empty($confirm_password)) {
            $error .= '<p class="error">Password did not match</p>';
        } else {
            if (empty($error) && ($password != $confirm_password)) { $error =
            '<p class="error">Password did not match.</p>';
            }
        }
        
        if (empty($error)) {
            # code..
            $insertQuery=$db->prepare("INSERT INTO users (name, email, password) VALUES(?, ?, ?);");
            $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
            $result = $insertQuery->execute();
            if ($result) {
                # code...
                $error .= '<p class="succes">Your registration was successful!</p>';
            } else {
                $error .= '<p class="error">Something went wrong!</p>';
            }
            
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css2/style.css">

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Roboto:400,700&display=swap"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
                    <a class="navbar-brand" href="utama.html">
                        <img src="images/logo.png" alt="" />
                        <span>
                            Brainwave
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-2">
                            <li class="nav-item active">
                                <a class="nav-link" href="utama.html">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="portfolio.html">Portfolio </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="service.html">Services</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact us</a>
                            </li>
                        </ul>
                        <div class="user_option">
                            <div class="login_btn-container">
                                <a href="login.html">
                                    Login
                                </a>
                            </div>
                            <form class="form-inline my-2 my-lg-0">
                                <!-- <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button> -->
                                <input type="text" placeholder="Search..">
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>


    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images2/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>



        <!-- JS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/circles.min.js"></script>
        <script src="js/custom.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>