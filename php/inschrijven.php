<?php
    require_once("../includes/session.php");
    require_once("../includes/connect.php");

    if (isset($_POST['add'])) {
        $sql = "SELECT * FROM inschrijvingen WHERE tafelnummer = :tafelnummer";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":tafelnummer", $_POST['tafelnummer']);
        $stmt->execute();
        $resultTable = $stmt->fetch();

        if (!$resultTable) {
            $betaald = 0;
            $sql = "INSERT INTO inschrijvingen (userID, tafelnummer, datum, betaald) VALUES (:userID, :tafelnummer,:datum, :betaald)";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(":userID", $_POST['userID']);
            $stmt->bindParam(":tafelnummer", $_POST['tafelnummer']);
            $stmt->bindParam(":datum", date("Y,m,d"));
            $stmt->bindParam(":betaald", $betaald);
            $stmt->execute();

            // Melding geven dat inschrijving is aangemaakt
            header("Location: ../inschrijven.php?message=createdinschrijving");
            exit();
        } else {
            // Melding geven dat tafelnummer al in gebruik is
            header("Location: ../inschrijven.php?message=tableinuse");
            exit();
        }
    } else if (isset($_POST['update'])) {
        $sql = "UPDATE inschrijvingen SET tafelnummer = :tafelnummer, betaald = :betaald WHERE inschrijfID = :inschrijfID";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":tafelnummer", $_POST['tafelnummer']);
        $stmt->bindParam(":betaald", $betaald);
        $stmt->bindParam(":inschrijfID", $_POST['inschrijfID']);
        $stmt->execute();

        // Melding geven dat inschrijving is aangepast
        header("Location: ../inschrijven.php?message=updated");
        exit();
    } else if (isset($_POST['remove'])) {
        $sql = "DELETE FROM inschrijvingen WHERE inschrijfID = :inschrijfID";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":inschrijfID", $_POST['inschrijfID']);
        $stmt->execute();

        // Melding geven dat inschrijving is verwijderd
        header("Location: ../inschrijven.php?message=removed");
        exit();
    } else {
        // Mag niet op deze pagina komen
        header("Location: ../../index.php");
        exit();
    }


?>