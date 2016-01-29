<html>
  <head>
    <title>Jobs</title>
  </head>
<?
    $host    ="205.178.146.109";
    $username="pamitc";
    $password="Pam1tc5qL";
    $database= "pamitcjobs";
    mysql_connect($host,$username,$password);
    mysql_select_db($database) or die("Unable to select database");

    $id  = $_POST['id'];
    $key = $_POST['key'];
    $msg = $_POST['msg'];
    if ($msg == "")
    {
      echo "<body>";
    }
    else
    {
      echo "<script type=\"text/javascript\">";
      $msg = rtrim(ltrim($msg,"\'"),"\'");
      echo "function ralert() {";
      echo "alert(\"$msg\");";
      echo "}";
      echo "</script>";

      echo "<body onload=\"ralert()\">";
    }

    $query  = "SELECT * FROM jobs WHERE idJob=$id AND randKey=\"$key\"";
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
      echo "<tr><td><b>Department:</b> $dept</td></tr>";
      echo "<tr><td><b>Posted:</b> $dateFormat</td></tr>";
      echo "<tr><td><hr><b>Description:</b> $descr</td></tr>";
      echo "<tr><td><hr><b>Application Instructions:</b> $instr</td></tr>";
      echo "</table>"
?>

    <table>
    <tr><td>
    <form action="jobs_processupdate.php" method="post">
       <input type="hidden" name="action" value="list"/>
<?
       echo "<input type=\"hidden\" name=\"id\" value=\"$id\"/>";
       echo "<input type=\"hidden\" name=\"key\" value=\"$key\"/>";
?>
       <input type="Submit" value="Done"/>
    </form>
    </td>

    <td>
    <form action="jobs_revise.php" method="post">
<?
       echo "<input type=\"hidden\" name=\"id\" value=\"$id\"/>";
       echo "<input type=\"hidden\" name=\"key\" value=\"$key\"/>";
?>
       <input type="Submit" value="Modify"/>
    </form>
    </td>


    <td>
<script type="text/javascript">
function confSubmit(form) {
if ( confirm( "Are you sure you wish to remove this posting?") ) {
form.submit();
}
}
</script>

    <form action="jobs_processupdate.php" method="post">
       <input type="hidden" name="action" value="remove"/>
<?
       echo "<input type=\"hidden\" name=\"id\" value=\"$id\"/>";
       echo "<input type=\"hidden\" name=\"key\" value=\"$key\"/>";
?>
       <input type="button" onClick="confSubmit(this.form)" value="Remove"/>
    </form>
    </td>
    </tr></table>

<?
    }
    else
    {
      echo "Message appears to have been removed.";
    }
?>
    
  <body>
</html>
