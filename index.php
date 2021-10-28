<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Experiment</title>
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
   <script src="myscripts.js"></script>
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
      var fiveMinutes = 60 * 5,
          display = document.querySelector('#time');
      startTimer(fiveMinutes, display);
    };
    </script>
    <meta http-equiv="refresh" content="300">
    <span id="time" style="font-size: 3rem;position: fixed; top: 50%; left: 50%;">05:00</span>
    <?php
    setcookie("part", 3, time()+(3600*2));

    // Vpn ist in Gruppe 1 (Kontrollgruppe) ; Pause
    if ($_COOKIE['group'] == "g1") {
      echo '';
    }

    // Vpn ist in Gruppe 2 (Testgruppe) ; Isochronic tones
    if ($_COOKIE['group'] == "g1") {
      echo '<embed src="./Isochrone_Beats_10Hz.mp3" loop="true" autostart="true" width="2" height="0">';
    }
  }
  ?>








</body>
</html>
