<!-- Aanmeld Modal -->
<div class="modal-spacer" id="aanmeldModal">
    <div class="modal aanmelden">
        <div class="image">
            <img src="assets/media/aanmelden.gif" alt="anime" />
        </div>
        <div class="content">
            <div class="intro">
                <h3>Aanmelden</h3>
                <p>
                <span>Melding: </span>Wachtwoord vergeten? In overleg met een admin kun je deze laten wijzigen.
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
                <p>Nog geen account? <span id="registreerlink">Registreer</span></p>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal-spacer" id="registratieModal">
    <div class="modal">
        <div class="image">
            <img src="assets/media/registreer.png" alt="anime" />
        </div>
        <div class="content">
            <div class="intro">
                <h3>Registreren</h3>
                <p>
                    <span>Melding: </span>Bij het registeren van een account geef je ons toestemming om je naam in deze applicatie te gebruiken. 
                </p>
            </div>
            <!-- Moet via AJAX in de toekomst -->
            <form action="php/register.php" method='post'>
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
                <div class="agree">
                    <input
                        type="checkbox"
                        name="agree"
                        required
                    />
                    <p>Ik ga akkoord met de bovenstaande melding.</p>
                </div>
                <button type="submit" name="registreer">Registreer</button>
            </form>
            <div class="option">
                <p>Heb je al een account? <span id="aanmeldLink">Meld je aan</span></p>
            </div>
        </div>
    </div>
</div>