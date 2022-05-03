<?php 
    $page = 'huisregels';
    include('includes/session.php');
    include('includes/connect.php');
    include('includes/header.php');
    include('includes/hamburger.php');
?>

<?php 
    include('includes/navigation.php');
    $likeDatum = "%".date("Y")."%";
?>

<main>
    <section class="introductie-spacer">
        <div class="container">
            <div class="introductie">
                <div class="heading">
                    <h2 class="title green">Algemeen</h2>
                    <p class="subtitle">Standaard instellingen</p>
                </div>
                <?php 
                    if (isset($_GET['message'])) {
                        $message = '';

                        switch ($_GET['message']) {
                            case 'updated':
                                $message = 'Inschrijving is aangepast.';
                                break;
                            default: 
                                $message = 'Er gaat iets fout bij het behandelen van een error';
                                break;
                        }
                ?>
                    <div class="alert-container">
                        <div class="alert">
                            <p><?php echo $message; ?></p>
                        </div>
                    </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </section>
    <div class="forms-spacer">
        <div class="container">
            <div class="forms">
                <?php 
                    if (isset($_GET['type'])) {
                        if ($_GET['type'] === 'update') {
                            $sql = "SELECT users.fullname, users.username, inschrijvingen.inschrijfID, inschrijvingen.tafelnummer, inschrijvingen.betaald FROM users INNER JOIN inschrijvingen ON users.userID = inschrijvingen.userID WHERE inschrijvingen.inschrijfID LIKE :inschrijfID";
                            $stmt = $connect->prepare($sql);
                            $stmt->bindParam(':inschrijfID', $_GET['inschrijving']);
                            $stmt->execute();
                            $user = $stmt->fetch();
                            $count = $stmt->rowCount();

                            if($count) {
                                if ($_GET['type'] === 'update') {
                ?>
                                    <form action="php/inschrijvingen.php" method='post'>
                                        <input
                                            type="text"
                                            name="inschrijfID"
                                            value="<?php echo $user['inschrijfID']; ?> - (Database ID)"
                                            required
                                            readonly
                                        />
                                        <input
                                            type="text"
                                            name="fullname"
                                            value="<?php echo $user['fullname']; ?>"
                                            required
                                            readonly
                                        />
                                        <button type="submit" name="update" class="update">Aanpassen</button>
                                    </form>
                <?php
                                }
                            }       
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <section class="table-spacer">
        <div class="container">
            <div class="table">
                <table>
                    <tr>
                        <th>Nummer</th>
                        <th>Volledige naam</th>
                        <th>Gebruikersnaam</th>
                        <th>Ingeschreven op</th>
                        <th>Betaald</th>
                        <th>Aanpassen</th>
                        <th>Uitschrijven</th>
                    </tr>
                    <?php

                        $sql = "SELECT users.fullname, users.username, inschrijvingen.inschrijfID, inschrijvingen.tafelnummer, inschrijvingen.datum, inschrijvingen.betaald FROM users INNER JOIN inschrijvingen ON users.userID = inschrijvingen.userID WHERE inschrijvingen.datum LIKE :datum ORDER BY inschrijvingen.tafelnummer ASC";
                        $stmt = $connect->prepare($sql);
                        $stmt->bindParam(':datum', $likeDatum);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        $count = $stmt->rowCount();

                        if (!$count) {
                    ?> 
                        <tr>
                            <td colspan="7">Geen gebruikers gevonden</td>
                        </tr>
                    <?php
                        } else {
                            foreach($result as $user) {
                    ?> 
                            <tr>
                                <td><?php echo $user['tafelnummer']; ?></td>
                                <td><?php echo $user['fullname']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['datum']; ?></td>
                                <td><?php if($user['betaald']) {echo 'ja';} else {echo 'nee';} ?></td>
                                <td><a href="inschrijvingen.php?type=update&inschrijving=<?php echo $user['inschrijfID']; ?>">Aanpassen</a></td>
                                <td><a href="inschrijvingen.php?type=remove&inschrijving=<?php echo $user['inschrijfID']; ?>" class="remove">Verwijderen</a></td>
                            </tr>
                    <?php
                                
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
</main>

<?php 
    include('includes/footer.php');
?>
