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
        <h2>Gapcoin - Mining hardware comparison.</h2>
        <table border="1" cellpadding="5" cellspacing="0">
          <tr>
            <td align="center"><b>Model</b></td>
            <td align="center"><b>pps</b></td>
            <td align="center"><b>Watts</b></td>
            <td align="center"><b>Clock</b></td>
            <td align="center"><b>Cores</b></td>
            <td align="center"><b>Miner</b></td>
            <td align="center"><b>Operating&nbsp;System</b></td>
            <td align="center"><b>Notes</b></td>
          </tr>
          <?php

            include("./mysql_connect.php");
            
            if (connect_db() == FALSE) {
              echo "<p>Database server not responding, please try again later</p>";
            } else {
              
              $query = "SELECT * FROM hardware_comparison WHERE valid=TRUE";
              $response = mysql_query($query);
            
              if ($response != FALSE) {
            
                $row = mysql_fetch_assoc($response);
                while ($row != false) {
            
                  echo "<tr>\n";
                  echo "<td align=\"left\">" . $row['model'] . "</td>\n";
                  echo "<td align=\"left\">" . $row['pps'] . "</td>\n";
                  echo "<td align=\"left\">" . $row['watts'] . "</td>\n";
                  echo "<td align=\"left\">" . $row['clock'] . "</td>\n";
                  echo "<td align=\"left\">" . $row['cores'] . "</td>\n";
                  echo "<td align=\"left\">" . $row['miner'] . "</td>\n";
                  echo "<td align=\"left\">" . $row['os'] . "</td>\n";
                  echo "<td align=\"left\">" . $row['notes'] . "</td>\n";
                  echo "</tr>\n";
                  $row = mysql_fetch_assoc($response);
                }   
              }
            }
          ?>
        </table>
        <br>
        <h3>Submit your own stats:</h3>
        <br>
        <table border="0" cellpadding="5" cellspacing="0">
          <form action="./hardware-comparison_submit.php" method="post">
            <tr>
              <td align="right">Manufacturer:&nbsp;</td>
              <td>
                <select name="manufacturer" size="1">
                  <option>Intel</option>
                  <option>AMD</option>
                  <option>Other</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right">Model:&nbsp;</td>
              <td><input name="model" type="text" size="30" maxlength="64"></td>
            </tr>
            <tr>
              <td align="right">pps:&nbsp;</td>
              <td><input name="pps" type="text" size="30" maxlength="30"></td>
            </tr>
            <tr>
              <td align="right">Watts:&nbsp;</td>
              <td><input name="watts" type="text" size="30" maxlength="32"></td>
            </tr>
            <tr>
              <td align="right">Clock:&nbsp;</td>
              <td><input name="clock" type="text" size="30" maxlength="32"></td>
            </tr>
            <tr>
              <td align="right">Cores:&nbsp;</td>
              <td><input name="cores" type="text" size="30" maxlength="32"></td>
            </tr>
            <tr>
              <td align="right">Miner:&nbsp;</td>
              <td><input name="miner" type="text" size="30" maxlength="128"></td>
            </tr>
            <tr>
              <td align="right">Operating&nbsp;System:&nbsp;</td>
              <td><input name="os" type="text" size="30" maxlength="128"></td>
            </tr>
            <tr>
              <td align="right">Notes:&nbsp;</td>
              <td><input name="notes" type="text" size="30" maxlength="256"></td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td><input align="left" name="submit" type="submit" value="submit" size="30"></td>
            </tr>
          </form>
        </table>
      </div>
    </div>
  </body>
</html>
