<html lang="de">
<head>
  <meta charset="utf-8">
  <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="language" content="de">
  <meta name="audience" content="experiment">
  <meta name="page-type" content="Formular">
  <meta name="robots" content="noindex, nofollow">
  <meta http-equiv="language" content="german, de">
  <meta name="author" content="Tom Aschmann">
  <meta name="copyright" content="Tom Aschmann">
  <meta name="publisher" content="Hochschule Rhein-Waal">
  <meta name="date" content="2021-10-22">
	<link rel="stylesheet" href="./main.css">
</head>
<body>

  <article>
<?php

if(!isset($_COOKIE['group'])) {

  // Randomisierte Einteilung der Gruppen in Gruppe 1 (Kontrollgruppe) und Gruppe 2 (Testgruppe)
  setcookie("group", "g".strval(rand(1,2)), time()+(3600*2));
  setcookie("part", 1, time()+(3600*2));
  echo '<meta http-equiv="refresh" content="1">';
}

if($_GET['part'] == 2 && $_COOKIE['part'] == 1) {
  setcookie("part", 2, time()+(3600*2));
  echo '<meta http-equiv="refresh" content="1">';
}

// Der erste Fragebogen wird ausgefüllt
if ($_COOKIE['part'] == 1) {
  // Vpn ist in Gruppe 1 (Kontrollgruppe)
  if ($_COOKIE['group'] == "g1") {
    ?>
    <iframe style="width:100%;" height="600px" src="https://forms.office.com/Pages/ResponsePage.aspx?id=njUQUMcHTkGjOf8CQAuBk00UEYZwLPtPrgaiHY3vIolUN0lRWkM1Mk5LSE9LMlhNWldKVk9MTzM4OS4u&embed=true" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
    <p>Bitte klicken Sie erst auf diesen Knopf, wenn Sie in dem oberen Fenster dazu aufgefordert werden.</p>
    <form method="get">
      <button type="submit" name="part" value=2>Weiter</button>
    </form>
    <?php
    }

  // Vpn ist in Gruppe 2 (Testgruppe)
  if ($_COOKIE['group'] == "g2") {
    ?>
    <iframe style="width:100%;" height="600px" src="https://forms.office.com/Pages/ResponsePage.aspx?id=njUQUMcHTkGjOf8CQAuBk00UEYZwLPtPrgaiHY3vIolUMlVWS1FQTk1FSDBGUUQ2VU82OU1SQTI2TC4u&embed=true" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
    <p>Bitte klicken Sie erst auf diesen Knopf, wenn Sie in dem oberen Fenster dazu aufgefordert werden.</p>
    <form method="get">
      <button type="submit" name="part" value=2>Weiter</button>
    </form>
    <?php
    }
  }

  // Pause / Isochronic tones ; Counter + Anweisung abzuwarten
  if ($_COOKIE['part'] == 2) {
    ?>
    <script>
    function startTimer(duration, display) {
      var timer = duration, minutes, seconds;
      setInterval(function () {
          minutes = parseInt(timer / 60, 10)
          seconds = parseInt(timer % 60, 10);

          minutes = minutes < 10 ? "0" + minutes : minutes;
          seconds = seconds < 10 ? "0" + seconds : seconds;

          display.textContent = minutes + ":" + seconds;

          if (--timer < 0) {
              timer = duration;
          }
      }, 1000);
    }

    window.onload = function () {
      var fiveMinutes = (60 * 5) - 4,
          display = document.querySelector('#time');
      startTimer(fiveMinutes, display);
    };
    </script>
    <meta http-equiv="refresh" content="300"> <!-- Sekundenzahl eingeben, wie lange die Pause dauern soll -->
    <section style="width: 900px; margin-left: auto; margin-right: auto; margin-top: 200px; font-size: 1.8rem;">
      <p>Nun folgt die angekündigte Pause. Es kann sein, dass Sie etwas auf Ihren Kopfhörern höhren, es kann allerdings auch sein, dass Sie nichts hören. Beides ist vollkommen normal.<br>
      Sobald der Countdown abgelaufen ist, starten Sie bitte direkt mit dem d2-Test.<br>
      <strong>Halten Sie dazu den Test bereit und drehen ihn <u>direkt<u> um und beginnen, sobald der Countdown abgelaufen ist!</strong></p>
      <span id="time" style="font-size: 4.5rem; position: fixed; top: 50%; left: 50%;">05:00</span>
    </section>
    <?php
    setcookie("part", 3, time()+(3600*2));

    // Vpn ist in Gruppe 2 (Testgruppe) ; Isochronic tones
    if ($_COOKIE['group'] == "g2") {
      echo '<audio autoplay><source src="Isochronic_Tone_175_13Hz.wav" type="audio/x-wav" /></audio>';
    }
  }

  // d2-Test wird bearbeitet
  if ($_COOKIE['part'] == 3) {
    setcookie("part", 4, time()+(3600*2));
    ?>
    <meta http-equiv="refresh" content="242"> <!-- 242 Sekunden = 4 Minuten + 2 Sekunden "Umdreh-Zeit". -->
    <section style="width: 900px; margin-left: auto; margin-right: auto; margin-top: 50px; font-size: 2rem;">
    <p>Bitte bearbeiten Sie den Test!</p>
    </section>

    <?php
        // Vpn ist in Gruppe 2 (Testgruppe) ; Isochronic tones
        if ($_COOKIE['group'] == "g2") {
          echo '<audio autoplay><source src="Isochronic_Tone_175_13Hz.wav" type="audio/x-wav" /></audio>';
        }
      }

  // Bearbeitungszeit des Tests ist vorbei. After-Fragebogen wird bearbeitet.
  if ($_COOKIE['part'] == 4) {
  ?>
  <embed src="./bell.mp3" autostart="true" width="2" height="0">
  <section style="width: 900px; margin-left: auto; margin-right: auto; margin-top: 50px; font-size: 2rem;">
    <p><strong>Bitte hören Sie mit dem bearbeiten des Test auf!</strong><br>
      Bitte füllen Sie nun den letzten Fragebogen aus und klicken Sie unten auf <i>Weiter</i>.
    </p>
  </section>
  <?php
    if ($_COOKIE['group'] == "g1") {
  ?>
  <iframe style="width:100%;" height="600px" src="https://forms.office.com/Pages/ResponsePage.aspx?id=njUQUMcHTkGjOf8CQAuBk00UEYZwLPtPrgaiHY3vIolUQ0EyWTFKT1Q2OTJNS1NIME5QNlE1VkNLTS4u&embed=true" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
  <p>Bitte klicken Sie erst auf diesen Knopf, wenn Sie in dem oberen Fenster dazu aufgefordert werden.</p>
  <form method="get" action="#finish">
    <button type="submit" name="part" value=3>Weiter</button>
  </form>
  <?php
    }
    if ($_COOKIE['group'] == "g2") {
      ?>
      <iframe style="width:100%;" height="600px" src="https://forms.office.com/Pages/ResponsePage.aspx?id=njUQUMcHTkGjOf8CQAuBk00UEYZwLPtPrgaiHY3vIolUMkxNNUI1RDdYMDY0VE1QU1FNRkVHVjdKWC4u&embed=true" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
      <p>Bitte klicken Sie erst auf diesen Knopf, wenn Sie in dem oberen Fenster dazu aufgefordert werden.</p>
      <form method="get" action="#finish">
        <button type="submit" name="part" value=3>Weiter</button>
      </form>
      <?php
    }
  }
    if ($_GET["part"] == "3") {
      ?>
      <section style="width: 900px; margin-left: auto; margin-right: auto; margin-top: 600px; font-size: 2.5rem;" id="finish">
        <h1>Geschafft! Vielen Dank für Ihre Teilnahme.</h1>
        <p>Bitte teilen Sie dem Versuchsleiter mit, dass Sie fertig sind.<br>
        Sie dürfen nun die Kopfhöhrer absetzen und den Versuch beenden.</p>
      </section>
      <?php

      // Alle Cookies löschen
      setcookie("group", "", time()-3600);
      setcookie("part", "", time()-3600);
    }
  ?>
</body>
</html>
