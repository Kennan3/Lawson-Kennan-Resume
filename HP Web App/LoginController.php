<?php
require_once("LoginModel.php");


//If post variable is set, and if the post data is login, log the user in. Try catch statement to catch incorrect passwords.
//Currently the site will redirect the user to the login page if the login is unsuccessful.
//This controller also sets the necessary cookies for the user logging in and registering.
if(isset($_POST['cmd']) && $_POST['cmd'] == 'Login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $model = new LoginModel();
    
    //Try and log user in. If not, catch exception. 
    try {
        $model->verify_login($username,$password);
        setcookie("loggedIn",true);
        setcookie("username",$username);
        setcookie("house",$model->get_house($username));
        setcookie("userType",$model->get_userType($username));
        setcookie("last",$model->get_last($username));
        header("Location: home.php");
    } catch(Exception $e) {
        header("Location: login.html");
    }
    
    //If not isset, redirect to login page. 
}

//If register button clicked register user. If user isn't registered, they will be redirected to the home page.
if(isset($_POST['cmd']) && $_POST['cmd'] == 'Register') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $house = $_POST['house'];
    $user_type = $_POST['user_type'];
    
    $model = new LoginModel();
    
    try {
        $model->register_user($username,$password,$first,$last,$house,$user_type);
        setcookie("loggedIn",true);
        setcookie("username",$username);
        setcookie("house",$model->get_house($username));
        setcookie("userType",$model->get_userType($username));
        setcookie("last",$last);
        header("Location: home.php");
    } catch(Exception $e) {
        header("Location: login.html");
    }
}

?>