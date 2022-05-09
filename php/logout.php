<?php 
    session_start();
    session_destroy();

    header('Location: ../inschrijven.php');
    exit();
?>