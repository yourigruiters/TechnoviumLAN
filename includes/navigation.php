<header class="landing <?php if($page === 'index') { echo 'homepage'; }?>">
    <div class="logo overlay"><h3>TechnoviumLAN</h3></div>
    <nav>
        <ul>
            <a href="index.php"><li>Home</li></a>
            <a href="inschrijven.php"><li>Inschrijven</li></a>
            <a href="huisregels.php"><li>Huisregels</li></a>
            <a href="contact.php"><li>Contact</li></a>
        </ul>
    </nav>
    <div class="hamburger" id="hamburger">
        <i class="fa-solid fa-burger"></i>
    </div>
    <div class="buttons">
        <ul>
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
</header>