        <footer>
            <h6>
                © 2022 | TechnoviumLAN<span>
                    | Created by Thijmen Lemmens & Youri Gruiters</span
                >
            </h6>
        </footer>

        <script src="assets/js/jQuery.js"></script>
        <?php 
            if($page === 'index') {
                echo '<script src="assets/js/index.js"></script>';
                echo '<script src="assets/js/header.js"></script>';
            }
            if($page === 'huisregels') {
                echo '<script src="assets/js/accordion.js"></script>';
            }
        ?>
        <script src="assets/js/modals.js"></script>
        <script src="assets/js/hamburger.js"></script>
    </body>
</html>