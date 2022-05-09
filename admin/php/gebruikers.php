<?php
    require_once("../includes/PHPsession.php");
    require_once("../includes/connect.php");

    if (isset($_POST['add'])) {
        if ($_POST['password'] === $_POST['passwordRepeat']) {

            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(":username", $_POST['username']);
            $stmt->execute();
            $result = $stmt->fetch();

            if(!$result) {
                $hashedPW = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $admin = 0;

                if (isset($_POST['admin'])) {
                    $admin = 1;
                }

                $sql = "INSERT INTO users (fullname, username, password, admin) VALUES (:fullname, :username,:password, :admin)";
                $stmt = $connect->prepare($sql);
                $stmt->bindParam(":fullname", $_POST['fullname']);
                $stmt->bindParam(":username", $_POST['username']);
                $stmt->bindParam(":password", $hashedPW);
                $stmt->bindParam(":admin", $admin);
                $stmt->execute();
    
                // Melding geven dat gebruiker is aangemaakt
                header("Location: ../gebruikers.php?message=created");
                exit();
            } else {
                // Gebruiker bestaat al met naam
                header("Location: ../gebruikers.php?message=nametaken");
                exit();
            }
        } else {
            // Wachtwoorden niet gelijk
            header("Location: ../gebruikers.php?message=matchingpasswords");
            exit();
        }
    } else if (isset($_POST['update'])) {
        $admin = 0;

        if (isset($_POST['admin'])) {
            $admin = 1;
        }

        $sql = "UPDATE users SET fullname = :fullname, username = :username, admin = :admin  WHERE userID = :userID";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":fullname", $_POST['fullname']);
        $stmt->bindParam(":username", $_POST['username']);
        $stmt->bindParam(":admin", $admin);
        $stmt->bindParam(":userID", $_POST['userID']);
        $stmt->execute();

        // Melding geven dat gebruiker is aangepast
        header("Location: ../gebruikers.php?message=updated");
        exit();
    } else if (isset($_POST['passwordUpdate'])) {
        if ($_POST['password'] === $_POST['passwordRepeat']) {
            $hashedPW = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password = :password WHERE userID = :userID";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(":password", $hashedPW);
            $stmt->bindParam(":userID", $_POST['userID']);
            $stmt->execute();

            // Melding geven dat wachtwoord is aangepast
            header("Location: ../gebruikers.php?message=updatedpassword");
            exit();
        } else {
            // Wachtwoorden niet gelijk
            header("Location: ../gebruikers.php?message=matchingpasswords");
            exit();
        }
    } else if (isset($_POST['remove'])) {
        $sql = "DELETE FROM users WHERE userID = :userID";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":userID", $_POST['userID']);
        $stmt->execute();

        // Melding geven dat gebruiker is verwijderd
        header("Location: ../gebruikers.php?message=removed");
        exit();
    } else {
        // Mag niet op deze pagina komen
        header("Location: ../../index.php");
        exit();
    }


?>