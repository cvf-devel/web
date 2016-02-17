<html>
  <head>
    <title>Jobs</title>
  </head>
  <body>

<?
function sendEmail( $name, $email, $title, $job_id, $randkey )
{
      //$ccto = "farrell@eecs.berkeley.edu"
      $subject = "[PAMITC-JOBS] Confirm Job Posting";
      $message = "Dear $name,\r\n\r\n";
      $message .= "Thank you for submitting the job posting \"$title\".\r\n\r\nTo complete the posting you will need to click on the following link:\r\n";
      $message .= "http://www.pamitc.org/iccv15/jobs_handle.php?action=confirm&job_id=$job_id&key=$randkey\r\n\r\n";
      $message .= "Keep this email, as if you subsequently need to make any changes or remove the listing you will need the following link:\r\n";
      $message .= "http://www.pamitc.org/iccv15/jobs_handle.php?action=revise&job_id=$job_id&key=$randkey\r\n\r\n";
      $header = "From: PAMITC JOBS <auto-confirm@pamitc.org>\r\n";
      //$header .= "Reply-to: farrell@pamitc.org\r\n";
      mail($email,$subject,$message,$header);
      //echo "Email confirmation sent!!";
}

function redirectToPreview($job_id,$key,$action,$msg)
{
  echo "<form action='jobs.php' method='post' name='frm'>";
  //$job_id  = $_GET['job_id'];
  //$key = $_GET['key'];
  //$action = $_GET['action'];
  echo "<input type='hidden' name='job_id' value='$job_id'>";
  echo "<input type='hidden' name='key' value='$key'>";
  echo "<input type='hidden' name='action' value='$action'>";
  echo "<input type='hidden' name='msg' value='$msg'>";
  echo "</form>";
  echo "<script language=\"JavaScript\">";
  echo "document.frm.submit();";
  echo "</script>";
}


    set_include_path(get_include_path().PATH_SEPARATOR.'../creds');
    require_once("connect_to_db.php"); // now connected to db


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


    if ($action == 'process_new')
    {
      $randkey = md5( $email . time() );
      $query  = "INSERT INTO jobs (title,organization,department,location,description,applicationInstructions,posterName,posterEmail,randKey,confirmed) VALUES (\"$title\",\"$org\",$dept,\"$loc\",\"$descr\",\"$instr\",\"$name\",\"$email\",\"$randkey\",0)";

      $result = mysql_query( $query );

      $query = "SELECT * FROM jobs WHERE randKey=\"$randkey\"";
      $result2 = mysql_query( $query );
      $job_id = mysql_result($result2,0,"idJob");

      mysql_close();
      //echo "RESULT=\"$result\"";

      if ($result==1)
      {
        sendEmail($name,$email,$title,$job_id,$randkey);
        header( 'Location: jobs.php?action=needs_confirm' ) ;
      }
    }




    //elseif ($action == 'revise')
    //{
        //header( 'Location: jobs.php?action=revise&job_id' ) ;
    //}

    elseif ($action == 'process_revise')
    {
      $job_id  = $_POST['job_id'];
      $randkey = $_POST['key'];

      $query  = "UPDATE jobs SET title=\"$title\",organization=\"$org\",department=$dept,location=\"$loc\",description=\"$descr\",applicationInstructions=\"$instr\" WHERE idJob=$job_id AND randKey=\"$randkey\"";
      $result2 = mysql_query( $query );
      //redirectToPreview($job_id,$randkey,"none","Success");
      header( "Location: jobs.php?action=preview&job_id=$job_id&key=$key" ) ;
    }
    elseif ($action == 'list')
    {
      header( 'Location: index.php' ) ;
    }
    elseif ($action == 'process_remove')
    {
      $job_id  = $_POST['job_id'];
      $randkey = $_POST['key'];
      $query = "DELETE FROM jobs WHERE idJob=$job_id AND randKey=\"$randkey\"";
      $result2 = mysql_query( $query );

      header( "Location: jobs.php?action=just_removed" );
    }
    elseif ($action == 'none')
    {
      $job_id  = $_POST['job_id'];
      $randkey = $_POST['key'];

      redirectToPreview($job_id,$randkey,"none","");
    }
    elseif ($action == 'confirm')
    {
      $job_id  = $_POST['job_id'];
      $randkey = $_POST['key'];
      $query = "SELECT * FROM jobs WHERE randKey=\"$randkey\"";
      $result2 = mysql_query( $query );
      $numrows = mysql_numrows( $result2 );
      if ($numrows==1)
      {
        $query = "UPDATE jobs SET confirmed=1 WHERE randKey=\"$randkey\"";
        $result2 = mysql_query( $query );
      }

      //redirectToPreview($job_id,$randkey,"none","Confirmed");
      header( 'Location: jobs.php?action=just_confirmed' ) ;
      //redirectToPreview($job_id,$randkey,"none");


    }




?>
    
  <body>
</html>
