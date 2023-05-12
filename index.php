<?php

include_once 'header.php';
include_once "classes/quiz.classes.php";

$quizClass = new Quiz();
$quizzes = $quizClass->getQuizzes();
/*
        create the quiz name and add it to database
        click the quiz if you are the inventor of it and CRUD questions
        click the quiz if you are not the inventor of it and answer the questions
        Grade the quiz
                update correct and incorrect for each answer for each user [View it]
        
    */


if (isset($_SESSION['user_username'])) { ?>

    <form action="includes/quiz.inc.php" method="GET">
        <input name="quiz_name" type="text" placeholder="New quiz" />
        <input name="userid" value="<?php echo $_SESSION['user_id'] ?>" type="hidden" />
        <button type="submit" name="submit">Create</button>
    </form>

<?php
} else { ?>

    <div class="forms-container">
        <form class="login-form" action="includes/login.inc.php" method="POST">
            <input placeholder="Email/Username" type="text" id="email" name="username">
            <input placeholder="Password" type="password" id="password" name="password">
            <button type="submit" name="submit">Log in</button>
        </form>
        <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <input placeholder="Username" type="text" id="username" name="username">
            <input placeholder="Email" type="email" id="email" name="email">
            <input placeholder="Password" type="password" id="password" name="password">
            <input placeholder="Repeat password" type="password" id="repeat-password" name="repeat-password">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>

<?php
}
?>


<div class="quiz-container">
    <h2>Choose a quiz</h2>
    <?php
    foreach ($quizzes as $quiz) {
        $quiz['quizzes_name'] . "<br>";
    ?>
        <!-- get the parameter from the url [with GET method] and get questions to this quiz -->
        <div>

            <!-- go to the page where you can add questions to the quiz -->
            <form action="">
                <a href="questions_view.php?id=<?php echo $quiz['quizzes_id']; ?>">
                    <h4><?php echo $quiz['quizzes_name'] ?></h4>
                </a>
                <?php
                if (
                    isset($_SESSION['user_id'])
                    && $_SESSION['user_id'] == $quiz['quizzes_users_id']
                ) {
                ?>
                    <button><a href="questions_add.php?<?php echo 'id=' . $quiz['quizzes_id'] ?>">Add Questions</a></button>
                <?php } ?>
            </form>
        </div>
    <?php

    }

    ?>
</div>

<?php

include "footer.php";

?>