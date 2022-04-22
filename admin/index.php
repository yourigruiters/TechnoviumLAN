<?php 
    $page = 'index';
    include('includes/header.php');
    include('includes/modals.php');
    include('includes/hamburger.php');
?>

<section class="landing-spacer">
    <div class="title overlay">
        <h1>TechnoviumLAN</h1>
        <h2>Where gamers unite!</h2>
    </div>
    <div class="background-video">
        <video autoplay muted loop>
            <source src="assets/media/video/background.mp4" type="video/mp4" />
            Your browser does not support the video tag.
        </video>
    </div>
    <header class="landing homepage">
        <div class="logo overlay"><h3>TechnoviumLAN</h3></div>
        <nav>
            <ul>
                <a href="index.php"><li>Home</li></a>
                <a href="inschrijven.php"><li>Inschrijven</li></a>
                <a href="huisregels.php"><li>Huisregels</li></a>
                <a href="contact.php"><li>Contact</li></a>
            </ul>
        </nav>
        <div class="buttons">
            <ul>
                <li>
                    <button id="aanmeldKnop">Aanmelden</button>
                </li>
                <li>
                    <button class="yellow" id="registratieKnop">
                        Registreren
                    </button>
                </li>
            </ul>
        </div>
    </header>
</section>

<main>
    <section class="introductie-spacer">
        <div class="container">
            <div class="introductie">
                <div class="heading">
                    <h2 class="title green">What's going on?</h2>
                    <p class="subtitle">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="content">
                    <p class="text">
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Sit nostrum minima nihil
                        dolores adipisci earum eaque excepturi natus
                        quidem, cumque repellat. Vero possimus unde
                        asperiores officia quia. Quis excepturi
                        molestias nulla accusantium veritatis illum,
                        laborum magnam quae neque, facere inventore
                        saepe commodi debitis doloremque quod molestiae.
                        Dolore vel iure officia accusamus similique
                        maiores fugiat quibusdam. Consectetur, impedit
                        quasi doloribus voluptate consequatur debitis id
                        officia omnis soluta eos ab expedita recusandae
                        unde veniam at esse ipsa sunt aut nemo libero
                        commodi nihil. Molestias rem cumque facilis
                        minima nisi, fugiat reprehenderit ipsum est sit.
                        Laboriosam ipsam!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="timer-spacer">
        <div class="container">
            <div class="timer">
                <p class="timer-text" id="countdown"></p>
            </div>
        </div>
    </section>

    <section class="informatie-spacer">
        <div class="informatie-blok">
            <div class="informatie">
                <div class="heading">
                    <h3 class="title green">What's going on?</h3>
                    <p class="subtitle">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="content">
                    <p class="text">
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Sit nostrum minima nihil
                        dolores adipisci earum eaque excepturi natus
                        quidem, cumque repellat. Vero possimus unde
                        asperiores officia quia. Quis excepturi
                        molestias nulla accusantium veritatis illum,
                        laborum magnam quae neque, facere inventore
                        saepe commodi debitis doloremque quod molestiae.
                        Dolore vel iure officia accusamus similique
                        maiores fugiat quibusdam. Consectetur, impedit
                        quasi doloribus voluptate consequatur debitis id
                        officia omnis soluta eos ab expedita recusandae
                        unde veniam at esse ipsa sunt aut nemo libero
                        commodi nihil. Molestias rem cumque facilis
                        minima nisi, fugiat reprehenderit ipsum est sit.
                        Laboriosam ipsam!
                    </p>
                </div>
            </div>
            <div class="afbeelding">
                <img src="assets/media/tekst1.png" alt="" />
            </div>
        </div>
        <div class="informatie-blok right-handed">
            <div class="afbeelding">
                <img src="assets/media/tekst2.png" alt="" />
            </div>
            <div class="informatie">
                <div class="heading">
                    <h3 class="title yellow">What's going on?</h3>
                    <p class="subtitle">Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="content">
                    <p class="text">
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Sit nostrum minima nihil
                        dolores adipisci earum eaque excepturi natus
                        quidem, cumque repellat. Vero possimus unde
                        asperiores officia quia. Quis excepturi
                        molestias nulla accusantium veritatis illum,
                        laborum magnam quae neque, facere inventore
                        saepe commodi debitis doloremque quod molestiae.
                        Dolore vel iure officia accusamus similique
                        maiores fugiat quibusdam. Consectetur, impedit
                        quasi doloribus voluptate consequatur debitis id
                        officia omnis soluta eos ab expedita recusandae
                        unde veniam at esse ipsa sunt aut nemo libero
                        commodi nihil. Molestias rem cumque facilis
                        minima nisi, fugiat reprehenderit ipsum est sit.
                        Laboriosam ipsam!
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php 
    include('includes/footer.php');
?>
