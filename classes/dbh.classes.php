<?php
class Dbh
{
    protected function connect()
    {
        try {
            $connection = new PDO('mysql:host=localhost;dbname=learning_space', "root", "");
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connection;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
