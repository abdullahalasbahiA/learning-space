<?php

include_once "classes/quiz.classes.php";

$quiz = new quiz();
include "header.php";
if (isset($_GET['id'])) {

    // get product id from url
    $quizId = $_GET['id'];
    // get product information from the database and store it as an associative array
    $quizAssoc = $quiz->getQuestions($quizId);
}
?>
<body>

    <form class="quiz-form" method="GET" action="includes/quiz.inc.php">
        <input type="text" name="question" placeholder="question">
        <input type="text" name="correct_answer" placeholder="correct answer">
        <input type="text" name="option1" placeholder="option 1">
        <input type="text" name="option2" placeholder="option 2">
        <input type="text" name="option3" placeholder="option 3">
        <input type="hidden" name="quiz_id" value="<?php echo $quizId ?>">
        <div>
            <button type="submit" name="submit-question">Done</button>
        </div>
    </form>

    <?php
    // view questions already in this quiz
    echo "<a href='#'>";
    echo "<a href='#'><h2 class='center-text'>Quiz Questions</h2></a>";
    ?>
    <div class="center-text">
        <?php
        foreach ($quizAssoc as $quiz) {
            echo '<h4>' . $quiz['questions_text'] . '</h4>' . "<br>";
        }
        ?>
    </div>
</body>

</html>