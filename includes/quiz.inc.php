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
} elseif(isset($_GET['submit-question'])) {
    $questionText = $_GET['question'];
    $correct_answer = $_GET['correct_answer'];
    $option1 = $_GET['option1'];
    $option2 = $_GET['option2'];
    $option = $_GET['option3'];
    $quizId = $_GET['quiz_id'];

    include_once "../classes/dbh.classes.php";
    include_once "../classes/quiz.classes.php";
    include_once "../classes/quiz-contr.classes.php";
    $quiz = new QuizContr($questionText, $correct_answer, $option1, $option2, $option);

    $quiz->addQuestion($questionText, $correct_answer, $option1, $option2, $option, $quizId);
    header("location: ../questions_add.php?id=".$quizId);

}
else {
    header("location: ../index.php");
    exit();
}
