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
                    <h2 class="title yellow">Inschrijvingen</h2>
                    <p class="subtitle">Huidige weergave voor kalenderjaar: <?php echo date("Y"); ?></p>
                </div>
                <div class="options">
                    <a href="inschrijvingen.php?type=add"><button>Inschrijvingen toevoegen</button></a>
                </div>
                <?php 
                    if (isset($_GET['message'])) {
                        $message = '';

                        switch ($_GET['message']) {
                            case 'created':
                                $message = 'Nieuwe gebruiker is toegevoegd.';
                                break;
                            case 'updated':
                                $message = 'Gebruiker is aangepast.';
                                break;
                            case 'updatedpassword':
                                $message = 'Wachtwoord van gebruiker is aangepast.';
                                break;
                            case 'removed':
                                $message = 'Gebruiker is verwijderd.';
                                break;
                            case 'nametaken':
                                $message = 'De ingevoerde gebruikersnaam wordt al gebruikt.';
                                break;
                            case 'matchingpasswords':
                                $message = 'De ingevoerde wachtwoorden waren niet gelijk aan elkaar.';
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
                        if ($_GET['type'] === 'add') {

                ?>
                        <form action="php/inschrijvingen.php" method='post'>
                            <input
                                type="text"
                                name="username"
                                placeholder="Gebruikersnaam..."
                                required
                            />
                            <select name="tafelnummer" required>
                                <option selected disabled>Kies een tafel...</option>
                                <?php 
                                    $sql = "SELECT tafelnummer FROM inschrijvingen WHERE datum LIKE :datum ORDER BY tafelnummer ASC";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->bindParam(':datum', $likeDatum);
                                    $stmt->execute();
                                    $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                    $count = 1;
                                    while ($count < 69) {
                                        if (!in_array($count, $results)) {
                                            echo "<option value='".$count."'>".$count."</option>";
                                        }
                                        $count++;
                                    }
                                ?>
                            </select>
                            <div class="agree">
                                <input
                                    type="checkbox"
                                    name="betaald"
                                />
                                <p>Gebruiker heeft betaald.</p>
                            </div>
                            <button type="submit" name="add" class="add">Inschrijving toevoegen</button>
                        </form>
                <?php 
                        } else if ($_GET['type'] === 'update' || $_GET['type'] === 'remove' || $_GET['type'] === 'password') {
                            $sql = "SELECT inschrijfID, tafelnummer, username, admin FROM users WHERE userID = :userID";
                            $stmt = $connect->prepare($sql);
                            $stmt->bindParam(':userID', $_GET['inschrijving']);
                            $stmt->execute();
                            $user = $stmt->fetch();
                            $count = $stmt->rowCount();

                            if($count) {
                                if ($_GET['type'] === 'update') {

                ?>
                                    <form action="php/inschrijvingen.php" method='post'>
                                        <input
                                            type="text"
                                            name="userID"
                                            value="<?php echo $user['userID']; ?>"
                                            required
                                            readonly
                                        />
                                        <input
                                            type="text"
                                            name="fullname"
                                            value="<?php echo $user['fullname']; ?>"
                                            required
                                        />
                                        <input
                                            type="text"
                                            name="username"
                                            value="<?php echo $user['username']; ?>"
                                            required
                                        />
                                        <div class="agree">
                                            <input
                                                type="checkbox"
                                                name="admin"
                                                <?php if ($user['admin']) { echo 'checked'; }?>
                                            />
                                            <p>Administrator account.</p>
                                        </div>
                                        <button type="submit" name="update" class="update">Aanpassen</button>
                                    </form>
                <?php
                                } else {
                ?> 
                                <form action="php/inschrijvingen.php" method='post'>
                                    <input
                                        type="text"
                                        name="userID"
                                        value="<?php echo $user['userID']; ?>"
                                        required
                                        readonly
                                    />
                                    <input
                                        type="text"
                                        name="username"
                                        value="<?php echo $user['username']; ?>"
                                        required
                                        readonly
                                    />
                                    <button type="submit" name="remove" class="remove">Ik weet het zeker, verwijderen</button>
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
