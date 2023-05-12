<?php

if(isset($_POST["submit"])){

    // Grabbing the data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeat-password"];
    $email = $_POST["email"];

    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($username, $password, $repeatPassword, $email);

    // Running error handlers and user signup
    $signup->signupUser();
    // Going to back to front page
    header("location: ../index.php?error=none");
}