<!-- Aanmeld Modal -->
<div class="modal-spacer" id="aanmeldModal">
    <div class="modal aanmelden">
        <div class="image">
            <img src="media/aanmelden.gif" alt="anime" />
        </div>
        <div class="content">
            <div class="intro">
                <h3>Aanmelden</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Magni debitis delectus quam nobis illum
                    dolorum?
                </p>
            </div>
            <!-- Moet via AJAX in de toekomst -->
            <form action="php/login.php" method="post">
                <input
                    type="text"
                    name="username"
                    placeholder="Gebruikersnaam..."
                    required
                />
                <input
                    type="password"
                    name="password"
                    placeholder="Wachtwoord..."
                    required
                />
                <button type="submit" name="aanmelden">Aanmelden</button>
            </form>
            <div class="option">
                <p>Nog geen account? <span>Registreer</span></p>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal-spacer" id="registratieModal">
    <div class="modal">
        <div class="image">
            <img src="media/registreer.png" alt="anime" />
        </div>
        <div class="content">
            <div class="intro">
                <h3>Registreren</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Magni debitis delectus quam nobis illum
                    dolorum?
                </p>
            </div>
            <!-- Moet via AJAX in de toekomst -->
            <form action="php/register.php" method='post'>
                <input
                    type="text"
                    name="username"
                    placeholder="Gebruikersnaam..."
                    required
                />
                <input
                    type="text"
                    name="email"
                    placeholder="Email..."
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
                <button type="submit" name="registreer">Registreer</button>
            </form>
            <div class="option">
                <p>Heb je al een account? <span>Meld je aan</span></p>
            </div>
        </div>
    </div>
</div>