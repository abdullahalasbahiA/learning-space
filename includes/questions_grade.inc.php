<?php

if (isset($_GET['submit_quiz_for_grade'])) {
    // Get the submitted answers from the form
    $submittedAnswers = $_GET;

    // Remove the 'submit_quiz_for_grade' key from the array
    unset($submittedAnswers['submit_quiz_for_grade']);

    // Retrieve the correct answers and question information from the database
    include "../classes/quiz.classes.php";
    $quiz = new quiz();
    $quizId = $_GET['quiz_id'];
    $questions = $quiz->getQuestions($quizId);

    // Initialize variables to track the number of correct and total answers
    $numCorrect = 0;
    $numTotal = count($questions);

    // Initialize arrays to store information about each question
    $questionStatuses = array();
    $questionAnswers = array();

    // Loop over each question in the quiz
    foreach ($questions as $question) {
        // Retrieve the correct answer and question information for this question
        $questionId = $question['questions_id'];
        $correctOption = $question['questions_answer'];
        $questionText = $question['questions_text'];
        $option1 = $question['option1'];
        $option2 = $question['option2'];
        $option3 = $question['option3'];

        // Retrieve the submitted answer for this question
        $submittedOption = $submittedAnswers[$questionId];

        // Check if the submitted answer matches the correct answer
        if ($submittedOption === $correctOption) {
            // Increment the number of correct answers
            $numCorrect++;

            // Store information about the question's status and correct answer
            $questionStatuses[$questionId] = "Correct";
            $questionAnswers[$questionId] = $correctOption;
        } else {
            // Store information about the question's status and correct answer
            $questionStatuses[$questionId] = "Incorrect";
            $questionAnswers[$questionId] = $correctOption;
        }
    }

    // Calculate the grade as a percentage
    $gradePercentage = ($numCorrect / $numTotal) * 100;

    // Round the grade to two decimal places
    $grade = round($gradePercentage, 2);

    // Redirect to the questions_view.php page with the score and question information as parameters in the URL
    $queryParameters = http_build_query(array(
        'id' => $quizId,
        'score' => $grade,
        'statuses' => $questionStatuses,
        'answers' => $questionAnswers
    ));
    header("Location: ../questions_view.php?$queryParameters");
} else {
    header("Location: ../questions_view.php");
}

?>
