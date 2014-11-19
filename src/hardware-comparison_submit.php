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
      <div id="artikel">
        <?php
          include("./mysql_connect.php");
          
          if (connect_db() == FALSE) {
            echo "<p>Database server not responding, please try again later</p>\n";
          } else {

            if (isset($_POST['manufacturer']) && $_POST['manufacturer'] != "" &&
                isset($_POST['model'])        && $_POST['model']        != "" &&
                isset($_POST['pps'])          && $_POST['pps']          != "" &&
                isset($_POST['clock'])        && $_POST['clock']        != "" &&
                isset($_POST['cores'])        && $_POST['cores']        != "" &&
                isset($_POST['miner'])        && $_POST['miner']        != "" &&
                isset($_POST['os'])           && $_POST['os']           != "") {

              $query = "INSERT INTO hardware_comparison (manufacturer, " .
                       "model, pps, watts, clock, cores, miner, os, notes) " .
                       "VALUES (" .
                       "'" . htmlentities($_POST['manufacturer'], ENT_QUOTES) . "', " .
                       "'" . htmlentities($_POST['model'], ENT_QUOTES) . "', " .
                       "'" . htmlentities($_POST['pps'], ENT_QUOTES) . "', " .
                       "'" . htmlentities($_POST['watts'], ENT_QUOTES) . "', " .
                       "'" . htmlentities($_POST['clock'], ENT_QUOTES) . "', " .
                       "'" . htmlentities($_POST['cores'], ENT_QUOTES) . "', " .
                       "'" . htmlentities($_POST['miner'], ENT_QUOTES) . "', " .
                       "'" . htmlentities($_POST['os'], ENT_QUOTES) . "', " .
                       "'" . htmlentities($_POST['notes'], ENT_QUOTES) . "')";
  
              if (mysql_query($query) == true) {
                echo "<p>Your entry was submitted, and will be reviewed.</p>";
              } else {
                echo "<p>Upps, server made a mistake, you may try again.</p>";
              }

              
            } else {
              echo "<p>Not all necessary information given!</p>";
            }
          }
        ?>
      </div>
      <?php include("./info.php"); ?>
    </div>
  </body>
</html>
