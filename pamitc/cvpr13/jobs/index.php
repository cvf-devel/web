<!DOCTYPE html>
<html>
  <head>
    <title>Jobs</title>
  </head>
	<p>
<?php
    $host    ="205.178.146.109";
    $username="pamitc";
    $password="Pam1tc5qL";
    $database= "pamitcjobs";
    mysql_connect($host,$username,$password);
    mysql_select_db($database) or die("Unable to select database");
    $query  = "SELECT * FROM jobs WHERE confirmed=1 ORDER BY datePosted DESC";
    $result = mysql_query( $query );
	echo "HELLO WORLD";	
    $numrows = mysql_numrows( $result );

    $msg = $_GET['msg'];
    if ($msg != "")
    {
      echo "<script type=\"text/javascript\">";
      $msg = rtrim(ltrim($msg,"\'"),"\'");
      echo "function ralert() {";
      echo "alert(\"$msg\");";
      echo "}";
      echo "</script>";

      echo "<body onload=\"ralert()\">";
    }
    else
    {
      echo "<body>";
    }    
    echo "<table><tr><td><b>Title</b></td><td><b>Organization/Company</b></td><td><b>Date Posted/Updated</b></td</tr>";
    $i = 0;
    while ( $i < $numrows )
    {
        $id         = mysql_result($result,$i,"idJob");
        $title      = mysql_result($result,$i,"title");
        $org        = mysql_result($result,$i,"organization");
        $datePosted = mysql_result($result,$i,"datePosted");
        $dateFormat = date('F j, Y',strtotime($datePosted));
        echo "<tr><td><a href=\"jobs_view.php?id=$id\">$title</a></td>";
        echo "<td>$org</td><td>$dateFormat</td></tr>";
        $i++;
    }
    echo "</table>";

?>
</p>



    
  <body>
</html>
