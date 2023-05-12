<?php
include "header.php";

include "classes/quiz.classes.php";
$quiz = new quiz();
if (isset($_GET['id'])) {

    // get product id from url
    $quizId = $_GET['id'];
    // get product information from the database and store it as an associative array
    $quizAssoc = $quiz->getQuestions($quizId);
    
    $count = 1;
?>


    <h1><?php 
        if(isset($_GET['score'])){
            echo "You have got ".$_GET['score']."%";
        }
    ?></h1>

    <form class="questions_form" method="GET" action="includes/questions_grade.inc.php">
<?php
    foreach ($quizAssoc as $quiz) {
        echo '<h4 style="width: 80%;margin:auto;
        text-align: left;" class="questions_view">' . $count++ . '-' . $quiz['questions_text'] . '</h4>' . "<br>";
?>

        <div 
            style="
            
            display: flex;
            width: 80%;
            flex-direction:column; 
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 35px; margin-top: -10px"
            class="answers">
            <div>
                <input type="hidden" name="quiz_id" value="<?php echo $quizId; ?>" />
                <input 
                    type="radio"
                    id="<?php echo $quiz['option1'] ?>" 
                    name="<?php echo $quiz['questions_id'] ?>" 
                    value="<?php echo $quiz['option1'] ?>">
                <label
                    for="<?php echo $quiz['option1'] ?>">
                        <?php echo $quiz['option1'] ?>
                </label>
            </div>
            <div>
                <input 
                    type="radio"
                    id="<?php echo $quiz['option2'] ?>" 
                    name="<?php echo $quiz['questions_id'] ?>" 
                    value="<?php echo $quiz['option2'] ?>">
                <label 
                    for="<?php echo $quiz['option2'] ?>">
                        <?php echo $quiz['option2'] ?>
                </label>
            </div>
            <div>
            <input 
                type="radio"
                id="<?php echo $quiz['questions_answer'] ?>" 
                name="<?php echo $quiz['questions_id'] ?>" 
                value="<?php echo $quiz['questions_answer'] ?>">
            <label 
                for="<?php echo $quiz['questions_answer'] ?>">
                    <?php echo $quiz['questions_answer'] ?>
            </label>
            </div>
            <div>
            <input 
                type="radio"
                id="<?php echo $quiz['option3'] ?>" 
                name="<?php echo $quiz['questions_id'] ?>" 
                value="<?php echo $quiz['option3'] ?>">
            <label 
                for="<?php echo $quiz['option3'] ?>">
                    <?php echo $quiz['option3'] ?>
            </label>
    </div>
        </div>
        <?php
    }
    
    ?>

    <button type="submit" name="submit_quiz_for_grade">Done</button>

    </form>
<?php
}

include "footer.php"; ?>


