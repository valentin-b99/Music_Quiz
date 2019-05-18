<?php
    session_start();
    if ($_SESSION['question'] > count($questions)) {
        $_SESSION['question'] = 1;
        $_SESSION['score'] = 0;
        echo 'success';
    }
?>