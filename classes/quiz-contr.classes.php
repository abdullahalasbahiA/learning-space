<?php

class QuizContr extends Quiz
{

    private $name;
    private $userId;

    public function __construct($name, $userId)
    {
        $this->name = $name;
        $this->userId = $userId;
    }

    public function createQuiz()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->addQuiz($this->name, $this->userId);
    }

    private function emptyInput()
    {
        if (empty($this->name) || empty($this->userId)) {
            return false;
        } else {
            return true;
        }
    }
}
