<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" />
    <title>Funk Gruppe Event | Funk Connect 2024</title>
    <meta name="description" content="Funk Gruppe Event | Funk Connect 2024">
    <?php require_once 'head.php'; ?>
</head>

<body>
    <header>
        <div class="event-title">
          <h1 class="header">Funk Connect</h1>
          <h2 class="header">Aus der Praxis für die Praxis</h2>
          <h2 class="fix">18. Juni 2024</h2>
          <div class="event-container-img"></div> 
        </div>
        <button class="homebutton"> <a class="goto" href="#anmeldung">zur Anmeldung</a> </button>
    </header>

    <section>
      <article class="intro">
        <h1>Persönliche Einladung <br> Baurecht in der Praxis erleben</h1>
        <p>
          <span>
          Sehr geehrte Damen und Herren
          </span>
          <span>
          Wir freuen uns, Sie zu unserem &laquo;Funk Connect&raquo; Event in unserer Niederlassung in Basel einzuladen. Unsere wiederkehrende Eventreihe &laquo;Funk Connect&raquo; bietet Einblicke von der Praxis für die Praxis. Knüpfen Sie wertvolle Kontakte in einem angenehmen und persönlichen Rahmen.
          </span>
          <span>
          Erleben Sie ein spannendes Impulsreferat der <strong>NEOVIUS AG</strong> zu Themen des öffentlichen und privaten Baurechts und erfahren Sie praxisnahe Einblicke von Herrn Daniel Gebhardt, Fachanwalt SAV Bau- und Immobilienrecht.
          </span>
          <span>
          Im Anschluss laden wir Sie herzlich zu einem Apéro Riche ein, bei dem ausreichend Zeit für ungezwungene Gespräche und Vernetzung bleibt.
          </span>
          <span>
          Wir freuen uns auf einen interessanten Austausch und einen gemütlichen Abend mit Ihnen.<br><br>
          <strong>Philipp Buser</strong><br>
          Leiter Niederlassung Basel</p>
          </span>
          
        </p>
      </article>

      <article>
        <div class="acctitle">
          <h2>Programm</h2>
          <div class="pmcontainer">
            <div class="plus"></div>
            <div class="minus"></div>
          </div>
          <div class="acclist">
            <div class="grid02">
              <p><strong>Datum</strong> </p>
              <p><strong>Dienstag, 18. Juni 2024</strong></p>
              <p>17:45 Uhr</p>
              <p>Eintreffen der Gäste</p>
              <p>18:00 Uhr</p>
              <p>Begrüssung / Referat Daniel Gebhardt</p>
              <p class="noline" >19:00 Uhr</p>
              <p class="noline" >Apéro riche / Networking</p>
            </div>
          </div>
        </div>
        <div class="acctitle">
          <h2>Referent</h2>
          <div class="pmcontainer">
            <div class="plus"></div>
            <div class="minus"></div>
          </div>
          <div class="acclist">
            <div class="grid02 center">
              <img src="./img/daniel-gebhardt.jpg" alt="daniel-gebhardt">
              <p class="noline">
                <strong>Daniel Gebhardt,</strong> <br> geboren 1960, Partner Neovius AG, Fachanwalt SAV Bau- und Immobilienrecht. Berät Unternehmen, öffentliche Hand und Privatpersonen in allen Belangen des Bau- und Immobilienrechts. Spezialisiert auf Raumplanung, Vertragswesen, Umweltschutzrecht, Submissionsrecht und Enteignungsrecht. Experte in der Begleitung von Grossprojekten vom Beginn bis zur Fertigstellung.
              </p>
            </div>
          </div>
        </div>
        <div class="acctitle">
          <h2>Anreise</h2>
          <div class="pmcontainer">
            <div class="plus"></div>
            <div class="minus"></div>
          </div>
          <div class="acclist">
            <div class="grid01">
              <p>
                <strong>Funk Gruppe</strong> <br>
                Henric Petri-Strasse 12, 4051 Basel
              </p>
              <p>
                <strong>Anreise mit dem ÖV:</strong> <br>
                Ab Bahnhof SBB mit 1er-Tram bis Kirschgarten, 3 Gehminuten entfernt
              </p>
              <p class="noline">
                <strong>Anreise mit dem PW:</strong> <br> Parkhaus Drachencenter oder Parkhaus Anfos</p>
            </div>
          </div>
        </div>
      </article>
      
      <div id="anmeldung" class="containerform">
            <h2>Anmeldung</h2>
            <p>Die Teilnehmerzahl ist beschränkt. Die Anmeldungen werden nach Eingang berücksichtigt. <strong>Anmeldeschluss ist der 4. Juni 2024.</strong></p>
            <?php require_once('form.php'); ?>

            <form id="contact" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
              
              <fieldset class="checkbox">
                <div>
                  <input class="radio" type="radio" id="checkbox1" name="teilnahme" value="Ja, ich nehme gerne teil" tabindex="1" 
                  <?= (isset($teilnahme) && $teilnahme == "Ja, ich nehme gerne teil") ? "checked" : "" ?>>
                  <label for="checkbox1">Ja, ich nehme gerne teil</label>
                </div>
                <div>
                  <input class="radio" type="radio" id="checkbox2" name="teilnahme" value="Leider bin ich verhindert" tabindex="2"
                  <?= (isset($teilnahme) && $teilnahme == "Leider bin ich verhindert") ? "checked" : "" ?>>
                  <label for="checkbox2">Leider bin ich verhindert</label>
                </div>
                <span class="error"><?= isset($errors["teilnahme"]) ? $errors["teilnahme"] : $teilnahme_error ?></span>
              </fieldset>

              <fieldset>
                <input placeholder="Vorname&#42;" type="text" name="vorname" value="<?= htmlspecialchars($vorname) ?>" tabindex="5" autofocus>
                <span class="error"><?= isset($errors["vorname"]) ? htmlspecialchars($errors["vorname"]) : htmlspecialchars($vorname_error) ?></span>
              </fieldset>

              <fieldset>
                <input placeholder="Name&#42;" type="text" name="name" value="<?= htmlspecialchars($name) ?>" tabindex="6">
                <span class="error"><?= isset($errors["name"]) ? htmlspecialchars($errors["name"]) : htmlspecialchars($name_error) ?></span>
              </fieldset>

              <fieldset>
                <input placeholder="Firma&#42;" type="text" name="firma" value="<?= htmlspecialchars($firma) ?>" tabindex="7">
                <span class="error"><?= isset($errors["firma"]) ? htmlspecialchars($errors["firma"]) : htmlspecialchars($firma_error) ?></span>
              </fieldset>

              <fieldset>
                <input placeholder="Email&#42;" type="text" name="email" value="<?= htmlspecialchars($email) ?>" tabindex="8">
                <span class="error"><?= isset($errors["email"]) ? htmlspecialchars($errors["email"]) : htmlspecialchars($email_error) ?></span>
              </fieldset>

              <fieldset>
                <textarea placeholder="Mitteilung" name="mitteilung" tabindex="9" rows="5"><?= htmlspecialchars($mitteilung) ?></textarea>
                <span class="error"><?= isset($errors["mitteilung"]) ? htmlspecialchars($errors["mitteilung"]) : htmlspecialchars($mitteilung_error) ?></span>
              </fieldset>

              <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Anfrage senden</button>
              </fieldset>
            </form>

            <div id="popup" class="popup">
              <h1>Vielen Dank für Ihr Interesse!</h1> 
              <p>Ihre An- oder Abmeldung haben wir erhalten. Eine persönliche Bestätigung Ihrer Anmeldung erhalten Sie in den nächsten Tagen per E-Mail.<br><br>
              Herzliche Grüsse <br>
              Philipp Buser <br>
              Leiter Niederlassung Basel</p>
              <button id="closePopup">Alles klar!</button>
            </div>
      </div> 
    </section>

    <script>
      function showPopup() {
          document.getElementById('popup').style.display = 'block';
      }
      document.getElementById('closePopup').addEventListener('click', function() {
          document.getElementById('popup').style.display = 'none';
      });

      <?php if (isset($success)) { ?>
          showPopup();
      <?php } ?>
    </script>

    <?php require_once 'footer.php'; ?>
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.6.3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>