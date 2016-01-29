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

    $id  = $_POST['id'];
    $key = $_POST['key'];

    $query  = "SELECT * FROM jobs WHERE idJob=$id AND randKey=\"$key\"";
    $result = mysql_query( $query );

    $numrows = mysql_numrows( $result );
    if ($numrows==1)
    {
        $title = mysql_result($result,0,"title");
        $org = mysql_result($result,0,"organization");
        $dept = mysql_result($result,0,"department");
        $loc = mysql_result($result,0,"location");
        $descr = mysql_result($result,0,"description");
        $instr = mysql_result($result,0,"applicationInstructions");
        $name = mysql_result($result,0,"posterName");
        $email = mysql_result($result,0,"posterEmail");
?>

    <table>
    <form action="jobs_processupdate.php" method="post">
    <input type="hidden" name="action" value="revise"/>
    <input type="hidden" name="confirmed" value="1"/>
    <input type="hidden" name="id" value="<? echo "$id"; ?>"/>
    <input type="hidden" name="key" value="<? echo "$key"; ?>"/>
    <tr><td align="right">Job Title:</td><td><input type="text" name="title" size="80" maxLength="127" value="<? echo "$title"; ?>"/></td></tr>
    <tr><td align="right">Organization (Company/Institution):</td><td><input type="text" name="org" size="80" maxLength="127" value="<? echo "$org"; ?>"/></td><tr>
    <tr><td align="right">Department:</td><td><input type="text" name="dept" size="80" maxLength="127" value="<? echo "$dept"; ?>"/></td><tr>
    <tr><td align="right">Location:</td><td><input type="text" name="loc" size="80" maxLength="127" value="<? echo "$loc"; ?>"/></td><tr>
    <tr><td align="right" valign="top">Job Description:</td><td><textarea name="descr" cols="80" rows="10"><? echo "$descr"; ?></textarea></td><tr>
    <tr><td align="right" valign="top">Application Instructions:</td><td><textarea name="instr" cols="80" rows="10"><? echo "$instr"; ?></textarea></td><tr>

    <tr><td></td><td>
    <input type="Submit" value="Update"/>
    </form>


    
    </td></tr>
    </table>

<?

    }
    else
    {
    }

?>

    
  <body>
</html>
