<?php 
    session_start();

    if(!isset($_SESSION['userID'])) {
        header('Location: ../../index.php');
        exit();
    } else {
        $userID = $_SESSION['userID'];
        $username = $_SESSION['username'];
    }
?>