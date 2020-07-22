<?php
start_session();
require_once "config.php";
$loggedInUsername = $_SESSION['username'];
$id = $_SESSION['id'];

        $answer = "";

        if (empty($_POST["answer"]))
        {
            $answer_err = "Please enter an answer";
        }
        else
        {
            $answer = trim($_POST["answer"]);
        }

        if ($answer == "songofunhealing")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points = points + 350, htmlno = 1 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-1');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
            
        }

?>