<?php
    session_start(); 
    $_SESSION = array();
    if (ini_get("session.use_cookies"))
    {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
    }
        unset($_SESSION['Lawyerlogin']);
        unset($_SESSION['Organization']);
        unset( $_SESSION['Name']);
        unset( $_SESSION['Contact']);
        unset( $_SESSION['Zipcode']);
        unset( $_SESSION['id']);
        unset( $_SESSION['city']);
        unset( $_SESSION['Leads']);
        unset( $_SESSION['Description']);
        unset( $_SESSION['total']);
        unset( $_SESSION['Catogory']);
        session_destroy(); // destroy session
        header("location:login"); 
?>

