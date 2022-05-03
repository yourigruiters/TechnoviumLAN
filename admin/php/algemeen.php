<?php
    require_once("../includes/PHPsession.php");
    require_once("../includes/connect.php");

    if (isset($_POST['update'])) {
        $id = 1;
        $sql = "UPDATE algemeen SET plaatsen = :plaatsen, startdatum = :startdatum, einddatum = :einddatum WHERE ID = :ID";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":plaatsen", $_POST['plaatsen']);
        $stmt->bindParam(":startdatum", $_POST['startdatum']);
        $stmt->bindParam(":einddatum", $_POST['einddatum']);
        $stmt->bindParam(":ID", $id);
        $stmt->execute();

        // Melding geven dat algemeen is aangepast
        header("Location: ../index.php?message=updated");
        exit();
    } else {
        // Mag niet op deze pagina komen
        header("Location: ../../index.php");
        exit();
    }


?>