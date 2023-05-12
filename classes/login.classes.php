<?php
class Login extends Dbh
{
    protected function getUser($username, $password)
    {
        $stmt = $this->connect()->prepare('SELECT users_password FROM users WHERE users_username = ? OR users_email = ?;');

        if (!$stmt->execute(array($username, $password))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=nouser");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]['users_password']);

        if ($checkPassword == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } else if ($checkPassword == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_username = ? OR users_email = ? AND users_password = ?;');

            if (!$stmt->execute(array($username, $username, $password))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=nouser");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['user_id'] = $user[0]['users_id'];
            $_SESSION['user_username'] = $user[0]['users_username'];

            $stmt = null;
        }
        $stmt = null;
    }
}
