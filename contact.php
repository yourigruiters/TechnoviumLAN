<?php 
    $page = 'contact';
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
                    <h2 class="title yellow">Contact</h2>
                    <p class="subtitle">Lorem ipsum dolor sit amet.</p>
                </div>
            </div> 
        </div>     
    </section>     
    <div class="contact-spacer">
        <div class="container">
            <div class="contact">
                <div class="map">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.9612256215028!2d5.868587915855283!3d51.82752816291921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c708fa2ca25e35%3A0x8daddc0e2cfc98dc!2sHeyendaalseweg%2098%2C%206525%20EE%20Nijmegen!5e0!3m2!1snl!2snl!4v1648396354558!5m2!1snl!2snl" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>  
                </div>   
                <div class="contactgegevens">
                    <div class="adres">
                        <h5>Adresgegevens</h5>
                        <div class="adres">
                            <p class="text">Heyendaalseweg 98</p>
                            <p class="text">6525 EE</p>
                            <p class="text">Nijmegen</p>
                        </div>
                    </div>
                    <div class="contactpersonen">
                        <h5>Contact personen</h5>
                        <div class="contact">
                            <p class="text">John Doe</p>
                            <p class="text">j.doe@hotmail.com</p>
                        </div>
                        <div class="contact">
                            <p class="text">John Doe</p>
                            <p class="text">j.doe@hotmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</main>

<?php 
    include('includes/footer.php');
?>