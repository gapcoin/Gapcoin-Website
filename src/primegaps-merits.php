<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gapcoin</title>
    <meta name="author" content="Jonny Frey">
    <meta name="description" content="A new scintific cryptocurrency which proof-of-work is based on searching for prime gaps.">
    <meta name="keywords" content="Gapcoin prime gaps cryptocurrency">

    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-196x196.png" sizes="196x196">
    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-160x160.png" sizes="160x160">
    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="shortcut icon" type="image/png" href="./img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rokkitt">
    <link rel="stylesheet" type="text/css" href="./styles.css" />
  </head>

  <body> 

    <div id="caption">
      <?php include("./caption.php") ?>
    </div>

    <div id="navigation">
      <?php include("./navigation.php") ?>
    </div>

    <div id="body_div">
      <div id="artikel_full">
        <h2>Gapcoin's highest found merits (Top 30)</h2>
	<?php echo file_get_contents("http://gapcoin.de/primegaps.php"); ?>
      </div>
    </div>
  </body>
</html>
