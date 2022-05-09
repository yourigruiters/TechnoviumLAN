<?php
    require_once("../includes/PHPsession.php");
    require_once("../includes/connect.php");

    if (isset($_POST['add'])) {
        $sql = "SELECT userID FROM users WHERE username = :username";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":username", $_POST['username']);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result) {
            $sql = "SELECT * FROM inschrijvingen WHERE tafelnummer = :tafelnummer";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(":tafelnummer", $_POST['tafelnummer']);
            $stmt->execute();
            $resultTable = $stmt->fetch();

            if (!$resultTable) {
                $betaald = 0;
    
                if (isset($_POST['betaald'])) {
                    $betaald = 1;
                }
    
                $sql = "INSERT INTO inschrijvingen (userID, tafelnummer, datum, betaald) VALUES (:userID, :tafelnummer,:datum, :betaald)";
                $stmt = $connect->prepare($sql);
                $stmt->bindParam(":userID", $result['userID']);
                $stmt->bindParam(":tafelnummer", $_POST['tafelnummer']);
                $stmt->bindParam(":datum", date("Y,m,d"));
                $stmt->bindParam(":betaald", $betaald);
                $stmt->execute();
    
                // Melding geven dat inschrijving is aangemaakt
                header("Location: ../inschrijvingen.php?message=created");
                exit();
            } else {
                // Melding geven dat tafelnummer al in gebruik is
                header("Location: ../inschrijvingen.php?message=tableinuse");
                exit();
            }
        } else {
            // Gebruikersnaam bestaat niet
            header("Location: ../inschrijvingen.php?message=namenotfound");
            exit();
        }
    } else if (isset($_POST['update'])) {
        $sql = "UPDATE inschrijvingen SET tafelnummer = :tafelnummer WHERE inschrijfID = :inschrijfID";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":tafelnummer", $_POST['tafelnummer']);
        $stmt->bindParam(":inschrijfID", $_POST['inschrijfID']);
        $stmt->execute();

        // Melding geven dat inschrijving is aangepast
        header("Location: ../inschrijvingen.php?message=updated");
        exit();
    } else if (isset($_POST['remove'])) {
        $sql = "DELETE FROM inschrijvingen WHERE inschrijfID = :inschrijfID";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":inschrijfID", $_POST['inschrijfID']);
        $stmt->execute();

        // Melding geven dat inschrijving is verwijderd
        header("Location: ../inschrijvingen.php?message=removed");
        exit();
    } else {
        // Mag niet op deze pagina komen
        header("Location: ../../index.php");
        exit();
    }


?>