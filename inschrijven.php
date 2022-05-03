<?php 
    $page = 'inschrijven';
    include('includes/session.php');
    include('includes/connect.php');
    include('includes/header.php');
    include('includes/modals.php');
    include('includes/hamburger.php');
?>

<?php 
    include('includes/navigation.php');
?>

<main>
    <section class="introductie-spacer">
        <div class="container">
            <div class="introductie">
                <div class="heading">
                    <h2 class="title yellow">Inschrijven</h2>
                    <p class="subtitle">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="options">
                    <a href="inschrijven.php?type=add"><button>Inschrijven</button></a>
                </div>
            </div>
        </div>
    </section>
    <div class="forms-spacer">
        <div class="container">
            <div class="forms inschrijven-form">
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
                        <button type="submit" name="add" class="add">Toevoegen</button>
                    </form>
                <?php 
                        } else if ($_GET['type'] === 'update' || $_GET['type'] === 'remove') {
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
                                        <input
                                            type="text"
                                            name="username"
                                            value="<?php echo $user['username']; ?>"
                                            required
                                            readonly
                                        />
                                        <select name="tafelnummer" required>
                                            <?php 
                                                $sql = "SELECT tafelnummer FROM inschrijvingen WHERE datum LIKE :datum ORDER BY tafelnummer ASC";
                                                $stmt = $connect->prepare($sql);
                                                $stmt->bindParam(':datum', $likeDatum);
                                                $stmt->execute();
                                                $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

                                                $count = 1;
                                                while ($count < 69) {
                                                    if ($count === $user['tafelnummer']) {
                                                        echo "<option value='".$count."' selected>".$count."</option>";
                                                    } else if (!in_array($count, $results)) {
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
                                                <?php if ($user['betaald']) { echo 'checked'; }?>
                                            />
                                            <p>Gebruiker heeft betaald.</p>
                                        </div>
                                        <button type="submit" name="update" class="update">Aanpassen</button>
                                    </form>
                <?php
                                } else {
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
    <section class="inschrijven-spacer">
        <div class="container">
            <div class="inschrijven">
                <div class="status">
                <?php 
                    if (isset($_GET['message'])) {
                        $message = '';

                        switch ($_GET['message']) {
                            case 'created':
                                $message = 'Je account is aangemaakt, je bent ook direct ingelogd.';
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
                    <div class="alert">
                        <p><?php echo $message; ?></p>
                    </div>
                <?php 
                    }
                ?>
                </div>
                <div class="floorplan">
                    <img src="assets/media/floorplan.png" alt="floorplan" />
                </div>
            </div>
        </div>
    </section>    
    <section class="table-spacer">
        <div class="container">
            <div class="table">
                <table>
                    <tr>
                        <th>Tafelnummer</th>
                        <th>Volledige naam</th>
                        <th>Gebruikersnaam</th>
                        <th>Ingeschreven op</th>
                        <th>Betaald</th>
                    </tr>
                    <?php
                        $likeDatum = "%".date("Y")."%";

                        $sql = "SELECT users.fullname, users.username, inschrijvingen.inschrijfID, inschrijvingen.tafelnummer, inschrijvingen.datum, inschrijvingen.betaald FROM users INNER JOIN inschrijvingen ON users.userID = inschrijvingen.userID WHERE inschrijvingen.datum LIKE :datum ORDER BY inschrijvingen.tafelnummer ASC";
                        $stmt = $connect->prepare($sql);
                        $stmt->bindParam(':datum', $likeDatum);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        $count = $stmt->rowCount();

                        if (!$count) {
                    ?> 
                        <tr>
                            <td colspan="5">Geen gebruikers gevonden</td>
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
