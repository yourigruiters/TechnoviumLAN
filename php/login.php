<?php
    if (isset($_POST['aanmelden'])) {
        require_once("../includes/connect.php");

        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":username", $_POST['username']);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result) {
            $passwordCheck = password_verify($_POST['password'], $result['password']);
            
            if ($passwordCheck) {
                session_start();

                $_SESSION['userID'] = $result['userID'];
                $_SESSION['username'] = $result['username'];

                if ($result['admin']) {
    
                    // Melding geven dat gebruiker is aangemaakt
                    header("Location: ../admin/index.php");
                    exit();

                } else {
    
                    // Melding geven dat gebruiker is aangemaakt
                    header("Location: ../inschrijven.php?message=loggedin");
                    exit();

                }
            } else {
                // Wachtwoord klopt niet
                header("Location: ../inschrijven.php?message=wrongpassword");
                exit();
            }
        } else {
            // Gebruiker bestaat niet met deze username
            header("Location: ../inschrijven.php?message=namenotfound");
            exit();
        }
    } else {
        // Mag niet op deze pagina komen
        header("Location: ../index.php");
        exit();
    }
?>