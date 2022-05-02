<?php 
    $page = 'huisregels';
    include('includes/session.php');
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
                    <button>Gebruiker toevoegen</button>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION FOR ADD/UPDATE/DELETE -->
    <section class="table-spacer">
        <div class="container">
            <div class="table">
                <table>
                    <tr>
                        <th>Admin</th>
                        <th>Volledige naam</th>
                        <th>Gebruikersnaam</th>
                        <th>Aanpassen</th>
                        <th>Verwijderen</th>
                    </tr>
                    <tr>
                        <td>Ja</td>
                        <td>Youri Gruiters</td>
                        <td>Youri</td>
                        <td>Germany</td>
                        <td>Germany</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</main>

<?php 
    include('includes/footer.php');
?>
