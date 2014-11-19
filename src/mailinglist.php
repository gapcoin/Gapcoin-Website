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

          //error_reporting (-1);    
          //ini_set ('display_errors', 1);  


          include("./mysql_connect.php");
          
          if (connect_db() == FALSE) {
            echo "<p>Database server not responding, please try again later</p>";
          } else {


            include("./email.php");
 
            // init randomn
            mt_srand(make_seed());
 
 
            $header = 'From: noreply@gapcoin.org' . "\r\n" .
                      'Reply-To: noreply@gapcoin.org' . "\r\n" .
                      'X-Mailer: PHP/' . phpversion();
 
            if (isset($_POST['email'])) {
              
              if (isset($_POST['unsubscribe'])) {
 
                $rand = mail_rand($_POST['email']);
 
                if ($rand == FALSE) {
                  echo "<p>Your email (";
                  echo htmlentities($_POST['email'], ENT_QUOTES);
                  echo ") is not in the mailing list!</p>";
                } else {
 
                  $mailcontent = "To unsubscribe form the Gapcoin" .
                                 " mailing list, please go to: \n" .
                                 "http://gapcoin.org/mailinglist.php?unsubscribe=" .
                                 $rand . "&email=" . urlencode($_POST['email']);
                  
                  $mailsubject = "Unsubscribe from the Gapcoin mailing list";
                  
                  mail($_POST['email'], $mailsubject, $mailcontent, $header);
 
                  echo "<p>A confirmation email was send to: ";
                  echo htmlentities($_POST['email'], ENT_QUOTES);
                  echo "<br>To complete your unsubscription please follow the link in it.</p>";
                }
              } else {
 
                if (mail_rand($_POST['email']) != FALSE) {
                  echo "<p>Your email (";
                  echo htmlentities($_POST['email'], ENT_QUOTES);
                  echo ") is already in the mailing list";
                  
                  if (mail_confirmed($_POST['email'])) {
                    echo ".</p>";
                  } else {
                    echo ", but not confirmed.</p>";
                  }
                } else {
                  $random = mt_rand(0, 2147483647);
                 
                  add_mail($_POST['email'], $random);
                 
                  echo "<p>A confirmation email was send to: ";
                  echo htmlentities($_POST['email'], ENT_QUOTES);
                  echo "<br>To complete your subscription please follow the link in it.</p>";
                 
                  $mailcontent = "Thanks for your interest in Gapcoin.\n\n" .
                                 "To confirm your subscription to the mailing list" .
                                 ", please go to: \n" .
                                 "http://gapcoin.org/mailinglist.php?subscribe=" .
                                 $random . "&email=" . urlencode($_POST['email']) .
                                 "\n";
                 
                  $mailsubject = "Gapcoin mailing list confirmation";
                 
                  mail($_POST['email'], $mailsubject, $mailcontent, $header);
                }
              }
            } elseif (isset($_GET['subscribe']) and isset($_GET['email'])) {
 
              if (!strcmp(mail_rand($_GET['email']), $_GET['subscribe'])) {
                
                confirm_mail($_GET['email'], $_GET['subscribe']);
                  
                echo "<p>Your email(" . htmlentities($_GET['email']) .
                     ") was added to the Gapcoin mailing list<p>";
                
              }
            } elseif (isset($_GET['unsubscribe']) and isset($_GET['email'])) {
 
              if (!strcmp(mail_rand($_GET['email']), $_GET['unsubscribe'])) {
                
                rm_mail($_GET['email'], $_GET['unsubscribe']);
                
                echo "<p>Your email (";
                echo htmlentities($_GET['email'], ENT_QUOTES);
                echo ") was removed from the mailing list.</p>";
              }
            }
          }
        ?>
      </div>
      <?php include("./info.php"); ?>
    </div>
  </body>
</html>
