<?php

class SignupContr extends Signup
{
    private $username;
    private $password;
    private $repeatPassword;
    private $email;
    
    public function __construct($username, $password, $repeatPassword, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
        $this->email = $email;
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUsername() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->passwordMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->usernameTakenCheck() == false) {
            header("location: ../index.php?error=usernameoremailtaken");
            exit();
        }
        $this->setUser($this->username, $this->password, $this->email);
    }

    /* ========================================================================== */
    /* ========================================================================== */
    /* ========================  Error Handling Methods  ======================== */
    /* ========================================================================== */
    /* ========================================================================== */

    private function emptyInput()
    {
        if (empty($this->username) || empty($this->password) || empty($this->repeatPassword) || empty($this->email)) {
            return false;
        } else {
            return true;
        }
    }

    private function invalidUsername()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            return false; // 
        } else {
            return true;
        }
    }

    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    private function passwordMatch()
    {
        if ($this->password !== $this->repeatPassword) {
            return false;
        } else {
            return true;
        }
    }

    private function usernameTakenCheck()
    {
        if ($this->checkUser($this->username, $this->email) == false) {
            return false;
        } else {
            return true;
        }
    }
}
