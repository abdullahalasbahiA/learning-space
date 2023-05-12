<?php
session_start();
include_once "../classes/quiz.classes.php";

$quiz = new Quiz();

if (isset($_GET['submit'])) {

    // Grabbing the data
    $quizName = $_GET["quiz_name"];
    $user_id = $_GET['userid'];

    // Instantiate QuizContr class    
    include_once "../classes/dbh.classes.php";
    include_once "../classes/quiz.classes.php";
    include_once "../classes/quiz-contr.classes.php";
    $quiz = new QuizContr($quizName, $user_id);

    $quiz->createQuiz();

    header("location: ../index.php?message=quiz_created");
} else {
    header("location: ../index.php");
    exit();
}
