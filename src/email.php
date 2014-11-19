<?php

function mail_rand($mail) {

  $query = "SELECT rand FROM mailinglist " .
           "WHERE email='" .
           htmlentities($mail, ENT_QUOTES) . "'";
  
  $response = mysql_query($query);
  
  if ($response != FALSE) {

    $row = mysql_fetch_assoc($response);

    if ($row != FALSE) {
      return $row['rand'];
    }   
  }
  
  return FALSE;
}

function mail_confirmed($mail) {

  $query = "SELECT rand FROM mailinglist " .
           "WHERE confirmed='TRUE' AND email='" .
           htmlentities($mail, ENT_QUOTES) . "'";
  
  $response = mysql_query($query);
  
  if ($response != FALSE) {

    $row = mysql_fetch_assoc($response);

    if ($row != FALSE) {
      return TRUE;
    }   
  }
  
  return FALSE;
}

function add_mail($mail, $rand) {

  $query = "INSERT INTO mailinglist (email, rand) VALUES ('" .
           htmlentities($mail, ENT_QUOTES) . "', " . $rand . ")";

  return mysql_query($query);
}

function confirm_mail($mail, $rand) {

  $query = "UPDATE mailinglist SET confirmed='TRUE' WHERE rand=" .
           htmlentities($rand, ENT_QUOTES) . " AND email='" .
           htmlentities($mail, ENT_QUOTES) . "'";

  return mysql_query($query);
}

function rm_mail($mail, $rand) {
  
  $query = "DELETE FROM mailinglist WHERE email='" .
           htmlentities($mail, ENT_QUOTES) . "' AND" .
           " rand=" . htmlentities($rand, ENT_QUOTES);
  
  return mysql_query($query);
}

function make_seed() {

  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}

?>
