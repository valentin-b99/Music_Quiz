<?php
    session_start();

    require("../require/questions.php");

    if (empty($_SESSION['question']) || !isset($_SESSION['score']) || $_SESSION['question'] < 1 || $_SESSION['question'] > count($questions)) {
        echo 'An error has occurred';
    } else if (empty($_POST['answer'])) {
        echo 'You did not check anything!';
    } else {
        if ($_POST['answer'] == $questions[$_SESSION['question']]['right'])
            $_SESSION['score']++;
        $_SESSION['question']++;
        echo 'success';
    }
?>