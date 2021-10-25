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
        setcookie("group", "g".strval(rand(1,2)), time()+(3600*2));
      } else {
        if ($_COOKIE['group'] == "g1" && !isset($_COOKIE['next'])) {
          ?>
          <iframe width="640px" height= "480px" src= "https://forms.office.com/Pages/ResponsePage.aspx?id=njUQUMcHTkGjOf8CQAuBk00UEYZwLPtPrgaiHY3vIolUN0lRWkM1Mk5LSE9LMlhNWldKVk9MTzM4OS4u&embed=true" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
          <form method="post">
            <input type="hidden" name="next" value="break">
            <button>Weiter</button>
          </form>
          <?php
        } elseif ($_COOKIE['group'] == "g2" && !isset($_COOKIE['next'])) {
          ?>
          <iframe width="640px" height= "480px" src= "https://forms.office.com/Pages/ResponsePage.aspx?id=njUQUMcHTkGjOf8CQAuBk00UEYZwLPtPrgaiHY3vIolUMlVWS1FQTk1FSDBGUUQ2VU82OU1SQTI2TC4u&embed=true" frameborder= "0" marginwidth= "0" marginheight= "0" style= "border: none; max-width:100%; max-height:100vh" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
          <form method="post">
            <input type="hidden" name="next" value="music">
            <button>Weiter</button>
          </form>
          <?php
        } elseif ($_COOKIE['group'] == "g1" || $_COOKIE['group'] == "g2") {

        } else {
          echo "Error: No group.";
        }
    ?>
</body>
</html>