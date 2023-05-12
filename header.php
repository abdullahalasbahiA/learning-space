<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="logo">Quiz</a>
            <ul>
                <li><a href="#">Home</a></li>
                <?php

                if (isset($_SESSION["user_id"])) {
                    echo '<li><a href="#">' . $_SESSION['user_username'] . '</a></li>';
                    echo '<li><a href="quiz_form.php">Create a QUIZ</a></li>';
                    echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
                } else {
                    echo '<li><a href="#">Log in</a></li>';
                    echo '<li><a href="#">Sign up</a></li>';
                }

                ?>
            </ul>
        </nav>
    </header>