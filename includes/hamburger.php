<!-- Menu overlay -->
<div class="hamburger-overlay" id="hamburger-overlay">
    <ul class="hamburger-menu">
        <li id="hamburger-close"><i class="fa-solid fa-xmark"></i></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="inschrijven.php">Inschrijven</a></li>
        <li><a href="huisregels.php">Huisregels</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php 
            if(!isset($userID)) {
        ?>
        <li>
            <button class="aanmeldKnop">Aanmelden</button>
        </li>
        <li>
            <button class="yellow registratieKnop">
                Registreren
            </button>
        </li>
        <?php 
            } else {
        ?>
        <li>
            <a href="php/logout.php">
                <button class="yellow">
                    Uitloggen
                </button>
            </a>
        </li>
        <?php 
            }
        ?>
    </ul>
</div>