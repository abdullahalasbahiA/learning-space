<?php


if(isset($_POST["submit"])){

    // Grabbing the data
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($username, $password);

    // Running error handlers and user signup
    $login->loginUser();
    // Going to back to front page
    header("location: ../index.php?error=none");
}