<?php 
    $page = 'inschrijven';
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
            </div>
        </div>
    </section>
    <section class="inschrijven-spacer">
        <div class="container">
            <div class="inschrijven">
                <div class="status">
                    <div class="alert">
                        <p>Log a.u.b. in voordat je gaat inschrijven.</p>
                    </div>
                </div>
                <div class="floorplan">
                    <img src="assets/media/floorplan.png" alt="floorplan" />
                </div>
            </div>
        </div>
    </section>
</main>

<?php 
    include('includes/footer.php');
?>
