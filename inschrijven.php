<?php 
    $page = 'inschrijven';
    include('includes/header.php');
    include('includes/modals.php');
?>

<header class="landing">
    <div class="logo overlay"><h3>TechnoviumLAN</h3></div>
    <nav>
        <ul>
            <a href="index.php"><li class="text">Home</li></a>
            <a href="inschrijven.php"><li class="text">Inschrijven</li></a>
            <a href="huisregels.php"><li class="text">Huisregels</li></a>
            <a href="contact.php"><li class="text">Contact</li></a>
        </ul>
    </nav>
    <div class="buttons">
        <ul>
            <li class="text">
                <button id="aanmeldKnop">Aanmelden</button>
            </li>
            <li class="text">
                <button class="yellow" id="registratieKnop">
                    Registreren
                </button>
            </li>
        </ul>
    </div>
</header>
<main>
    <section class="introductie-spacer">
        <div class="container">
            <div class="introductie">
                <div class="heading">
                    <h2 class="title yellow">Inschrijven</h2>
                    <p class="subtitle">Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="inschrijven-spacer">
        <div class="container">
            <div class="inschrijven">

            </div>
        </div>
    </section>
</main>

<?php 
    include('includes/footer.php');
?>
