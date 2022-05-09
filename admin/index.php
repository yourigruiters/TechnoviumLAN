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
                                $message = 'De data is aangepast.';
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
                    $id = 1;
                    $sql = "SELECT * FROM algemeen WHERE ID = :ID";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':ID', $id);
                    $stmt->execute();
                    $user = $stmt->fetch();
                    $count = $stmt->rowCount();

                    if (isset($_GET['type'])) {
                        if ($_GET['type'] === 'update') {
                            if($count) {
                ?>
                                <form action="php/algemeen.php" method='post'>
                                    <input
                                        type="text"
                                        name="plaatsen"
                                        value="<?php echo $user['plaatsen']; ?>"
                                        required
                                    />
                                    <input
                                        type="date"
                                        name="startdatum"
                                        value="<?php echo $user['startdatum']; ?>"
                                        required
                                    />
                                    <input
                                        type="date"
                                        name="einddatum"
                                        value="<?php echo $user['einddatum']; ?>"
                                        required
                                    />
                                    <button type="submit" name="update" class="update">Aanpassen</button>
                                </form>
                <?php
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
                        <th>Aantal plaatsen</th>
                        <th>Start inschrijvingen</th>
                        <th>Einde inschrijvingen</th>
                        <th>Aanpassen</th>
                    </tr>
                    <?php
                        if (!$count) {
                    ?> 
                        <tr>
                            <td colspan="4">Geen data gevonden</td>
                        </tr>
                    <?php
                        } else {
                    ?> 
                            <tr>
                                <td><?php echo $user['plaatsen']; ?></td>
                                <td><?php echo $user['startdatum']; ?></td>
                                <td><?php echo $user['einddatum']; ?></td>
                                <td><a href="index.php?type=update">Aanpassen</a></td>
                            </tr>
                    <?php
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
