<html>
  <head>
    <title>Jobs</title>
  </head>
  <body>

<?
function sendEmail( $name, $email, $id, $randkey )
{
      //$ccto = "farrell@eecs.berkeley.edu"
      $subject = "[PAMITC-JOBS] Confirm Job Posting";
      $message = "Dear $name,\r\n\r\n";
      $message .= "Thank you for submitting a job posting, to complete the posting you will need to click on the following link:\r\n";
      $message .= "http://www.pamitc.org/jobs_edit.php?action=confirm&id=$id&key=$randkey\r\n\r\n";
      $message .= "Keep this email, as if you subsequently need to make any changes or remove the listing you will need the following link:\r\n";
      $message .= "http://www.pamitc.org/jobs_edit.php?action=none&id=$id&key=$randkey\r\n\r\n";
      $header = "From: auto-confirm@pamitc.org\r\n";
      //$header .= "Reply-to: farrell@pamitc.org\r\n";
      mail($email,$subject,$message,$header);
      //echo "Email confirmation sent!!";
}

function redirectToPreview($id,$key,$action,$msg)
{
  echo "<form action='jobs_preview.php' method='post' name='frm'>";
  //$id  = $_GET['id'];
  //$key = $_GET['key'];
  //$action = $_GET['action'];
  echo "<input type='hidden' name='id' value='$id'>";
  echo "<input type='hidden' name='key' value='$key'>";
  echo "<input type='hidden' name='action' value='$action'>";
  echo "<input type='hidden' name='msg' value='$msg'>";
  echo "</form>";
  echo "<script language=\"JavaScript\">";
  echo "document.frm.submit();";
  echo "</script>";
}



    $host    ="205.178.146.109";
    $username="pamitc";
    $password="Pam1tc5qL";
    $database= "pamitcjobs";
    mysql_connect($host,$username,$password);
    mysql_select_db($database) or die("Unable to select database");


    $action = $_POST['action'];
    $title  = $_POST['title'];
    $org    = $_POST['org'];
    $dept   = $_POST['dept'];
    if ($dept=="") $dept="NULL"; else $dept = "\"$dept\"";
    $loc    = $_POST['loc'];
    $descr  = $_POST['descr'];
    $instr  = $_POST['instr'];
    $name   = $_POST['poster'];
    $email  = $_POST['poster_email'];


    if ($action == 'new')
    {
      $randkey = md5( $email . time() );
      $query  = "INSERT INTO jobs (title,organization,department,location,description,applicationInstructions,posterName,posterEmail,randKey,confirmed) VALUES (\"$title\",\"$org\",$dept,\"$loc\",\"$descr\",\"$instr\",\"$name\",\"$email\",\"$randkey\",0)";

      $result = mysql_query( $query );

      $query = "SELECT * FROM jobs WHERE randKey=\"$randkey\"";
      $result2 = mysql_query( $query );
      $id = mysql_result($result2,0,"idJob");

      mysql_close();
      //echo "RESULT=\"$result\"";

      if ($result==1)
      {
        sendEmail($name,$email,$id,$randkey);
        echo "Posting saved, but not yet active.<br><br>Check your email and click on the confirmation link.";
      }
    }
    elseif ($action == 'revise')
    {
      $id      = $_POST['id'];
      $randkey = $_POST['key'];

      $query  = "UPDATE jobs SET title=\"$title\",organization=\"$org\",department=$dept,location=\"$loc\",description=\"$descr\",applicationInstructions=\"$instr\" WHERE idJob=$id AND randKey=\"$randkey\"";
      $result2 = mysql_query( $query );
      redirectToPreview($id,$randkey,"none","Success");
    }
    elseif ($action == 'list')
    {
      header( 'Location: index.php' ) ;
    }
    elseif ($action == 'remove')
    {
      $id      = $_POST['id'];
      $randkey = $_POST['key'];
      $query = "DELETE FROM jobs WHERE idJob=$id AND randKey=\"$randkey\"";
      $result2 = mysql_query( $query );

      header( 'Location: index.php?msg=\'Posting Removed\'' );
    }
    elseif ($action == 'none')
    {
      $id      = $_POST['id'];
      $randkey = $_POST['key'];

      redirectToPreview($id,$randkey,"none","");
    }
    elseif ($action == 'confirm')
    {
      $id      = $_POST['id'];
      $randkey = $_POST['key'];
      $query = "SELECT * FROM jobs WHERE randKey=\"$randkey\"";
      $result2 = mysql_query( $query );
      $numrows = mysql_numrows( $result2 );
      if ($numrows==1)
      {
        $query = "UPDATE jobs SET confirmed=1 WHERE randKey=\"$randkey\"";
        $result2 = mysql_query( $query );
      }

      redirectToPreview($id,$randkey,"none","Confirmed");
      //redirectToPreview($id,$randkey,"none");


    }




?>
    
  <body>
</html>
