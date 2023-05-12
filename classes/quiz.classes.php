<?php

include_once "dbh.classes.php";

class Quiz extends Dbh
{
    public function addQuiz($quizName, $userId)
    {
        //	quizzes_name	quizzes_users_id	
        $stmt = $this->connect()->prepare('INSERT INTO quizzes (quizzes_name, quizzes_users_id) VALUES (?,?);');
        $stmt->execute(array($quizName, $userId));
    }

    public function getQuizzes()
    {
        $sql = "SELECT * FROM quizzes ORDER BY quizzes_id;";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getQuestions($quizId)
    {
        $sql = "SELECT * FROM questions WHERE questions_quizzes_id = '$quizId';";
        $stmt = $this->connect()->query($sql);
        // $stmt->execute([$quizId]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function addQuestion($questionText,$questionAnswer,$option1,$option2,$option3,$quizId)
    {
        //	questions_text	questions_quizzes_id	
        $stmt = $this->connect()->prepare('INSERT INTO questions (questions_text, questions_quizzes_id,questions_answer,option1,option2,option3) VALUES (?,?,?,?,?,?);');
        $stmt->execute(array($questionText, $quizId,$questionAnswer,$option1,$option2,$option3));
    }

}
