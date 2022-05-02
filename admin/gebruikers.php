<?php 
    $page = 'huisregels';
    include('includes/session.php');
    include('includes/connect.php');
    include('includes/header.php');
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
                    <h2 class="title green">Gebruikers</h2>
                    <p class="subtitle">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="options">
                    <a href="gebruikers.php?type=add"><button>Gebruiker toevoegen</button></a>
                </div>
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
                        <form action="php/gebruikers.php" method='post'>
                            <input
                                type="text"
                                name="fullname"
                                placeholder="Volledige naam (niet zichtbaar op de website)..."
                                required
                            />
                            <input
                                type="text"
                                name="username"
                                placeholder="Gebruikersnaam (zichtbaar op de website)..."
                                required
                            />
                            <input
                                type="password"
                                name="password"
                                placeholder="Wachtwoord..."
                                required
                            />
                            <input
                                type="password"
                                name="passwordRepeat"
                                placeholder="Wachtwoord herhalen..."
                                required
                            />
                            <button type="submit" name="add" class="add">Toevoegen</button>
                        </form>
                <?php 
                        } else if ($_GET['type'] === 'update' || $_GET['type'] === 'remove' || $_GET['type'] === 'password') {
                            $sql = "SELECT userID, fullname, username, admin FROM users WHERE userID = :userID";
                            $stmt = $connect->prepare($sql);
                            $stmt->bindParam(':userID', $_GET['user']);
                            $stmt->execute();
                            $user = $stmt->fetch();
                            $count = $stmt->rowCount();

                            if($count) {
                                if ($_GET['type'] === 'update') {

                ?>
                                    <form action="php/gebruikers.php" method='post'>
                                        <input
                                            type="text"
                                            name="fullname"
                                            value="<?php echo $user['fullname']; ?>"
                                            required
                                        />
                                        <input
                                            type="text"
                                            name="username"
                                            value="<?php echo $user['fullname']; ?>"
                                            required
                                        />
                                        <button type="submit" name="update" class="update">Aanpassen</button>
                                    </form>
                <?php
                            } else if ($_GET['type'] === 'password') {
                ?>
                                <form action="php/gebruikers.php" method='post'>
                                    <input
                                        type="text"
                                        name="fullname"
                                        placeholder="Volledige naam (niet zichtbaar op de website)..."
                                        required
                                    />
                                    <input
                                        type="text"
                                        name="username"
                                        placeholder="Gebruikersnaam (zichtbaar op de website)..."
                                        required
                                    />
                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="Wachtwoord..."
                                        required
                                    />
                                    <input
                                        type="password"
                                        name="passwordRepeat"
                                        placeholder="Wachtwoord herhalen..."
                                        required
                                    />
                                    <button type="submit" name="password" class="update">Wachtwoord wijzigen</button>
                                </form>                
                <?php 
                                } else {
                ?> 
                                <form action="php/gebruikers.php" method='post'>
                                    <input
                                        type="text"
                                        name="fullname"
                                        placeholder="Volledige naam (niet zichtbaar op de website)..."
                                        required
                                    />
                                    <input
                                        type="text"
                                        name="username"
                                        placeholder="Gebruikersnaam (zichtbaar op de website)..."
                                        required
                                    />
                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="Wachtwoord..."
                                        required
                                    />
                                    <input
                                        type="password"
                                        name="passwordRepeat"
                                        placeholder="Wachtwoord herhalen..."
                                        required
                                    />
                                    <button type="submit" name="remove" class="remove">Verwijderen</button>
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
                        <th>Admin</th>
                        <th>Volledige naam</th>
                        <th>Gebruikersnaam</th>
                        <th>Aanpassen</th>
                        <th>Wachtwoord</th>
                        <th>Verwijderen</th>
                    </tr>
                    <?php
                        $sql = "SELECT userID, fullname, username, admin FROM users ORDER BY admin desc";
                        $stmt = $connect->prepare($sql);
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
                                <td><?php if($user['admin']) {echo 'ja';} else {echo 'nee';} ?></td>
                                <td><?php echo $user['fullname']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><a href="gebruikers.php?type=update&user=<?php echo $user['userID']; ?>">Aanpassen</a></td>
                                <td><a href="gebruikers.php?type=password&user=<?php echo $user['userID']; ?>">Wijzigen</a></td>
                                <td><a href="gebruikers.php?type=remove&user=<?php echo $user['userID']; ?>" class="remove">Verwijderen</a></td>
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
