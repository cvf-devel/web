<html>
  <head>
    <title>Jobs</title>
  </head>
  <body>
<?
    $host    ="205.178.146.109";
    $username="pamitc";
    $password="Pam1tc5qL";
    $database= "pamitcjobs";
    mysql_connect($host,$username,$password);
    mysql_select_db($database) or die("Unable to select database");

    $id  = $_GET['id'];

    $query  = "SELECT * FROM jobs WHERE idJob=$id";
    $result = mysql_query( $query );

    $numrows = mysql_numrows( $result );
    if ($numrows==1)
    {
      echo "<table width=\"800\">";
      $i = 0;
      $id         = mysql_result($result,$i,"idJob");
      $title      = mysql_result($result,$i,"title");
      $org        = mysql_result($result,$i,"organization");
      $dept        = mysql_result($result,$i,"department");
      $datePosted = mysql_result($result,$i,"datePosted");
      $dateFormat = date('F j, Y',strtotime($datePosted));
      $descr      = mysql_result($result,$i,"description");
      $instr      = mysql_result($result,$i,"applicationInstructions");
      //$name       = mysql_result($result,$i,"applicationInstructions");

      echo "<tr><td><i>$title</i></td></tr>";
      echo "<tr><td><hr><b>Organization:</b> $org</td></tr>";
      if ($dept != "")
      {
        echo "<tr><td><b>Department:</b> $dept</td></tr>";
      }
      echo "<tr><td><b>Posted:</b> $dateFormat</td></tr>";
      echo "<tr><td><hr><b>Description:</b> $descr</td></tr>";
      echo "<tr><td><hr><b>Application Instructions:</b> $instr</td></tr>";
      echo "</table>";
    }
    else
    {
      echo "Message appears to have been removed.";
    }

?>
    
  <body>
</html>
