<?php
    $which_page = "jobs";
    include('common_header.php');
?>

<table border="0" width="100%">
<tr><td>
<?php




    set_include_path(get_include_path().PATH_SEPARATOR.'../creds');
    require_once("connect_to_db.php"); // now connected to db

    $query  = "SELECT * FROM jobs WHERE confirmed=1 ORDER BY datePosted DESC";
    $result = mysql_query( $query );

    $numrows = mysql_numrows( $result );

    $action = $_GET['action'];
    $job_id = $_GET['job_id'];
    /*$msg = $_GET['msg'];

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
    }*/
    $MSG = false;
    $ALERT_MSG = "";
    if ($action == "needs_confirm")
    {
        $ALERT_MSG = "Posting saved, but not yet active.\\n\\nPlease check your email and click on the\\nconfirmation link to activate this posting.";
        $action = "";
    }
    elseif ($action =="just_confirmed")
    {
        $ALERT_MSG = "Posting activated!";
        $action = "";
    }
    elseif ($action =="just_removed")
    {
        $ALERT_MSG = "Posting removed!";
        $action = "";
    }
    elseif ($action =="finished_revising")
    {
        $ALERT_MSG = "Update complete!";
        $action = "";
    }



    echo "<center>";
    //echo "<table width=\"650\">";
    echo "<table width=\"650\" cellpadding=\"2\" cellspacing=\"0\">";

    if ($action == "new")
    {
        //  ADD  //
        echo "<tr><td align=\"center\" colspan=\"2\"><span class=\"cvprpageheader\">PamiTC/CVPR Job Board - New Posting</span><br><br></td></tr>";
?>
<tr><td>
    <form action="jobs_processupdate.php" method="post">
    <input type="hidden" name="action" value="process_new"/>
    <table>
    <tr><td align="right">Job Title:</td><td><input type="text" name="title" size="60" maxLength="127"/></td></tr>
    <tr><td align="right">Company/Institution:</td><td><input type="text" name="org" size="60" maxLength="127"/></td><tr>
    <tr><td align="right">Department:</td><td><input type="text" name="dept" size="60" maxLength="127"/></td><tr>
    <tr><td align="right">Location:</td><td><input type="text" name="loc" size="60" maxLength="127"/></td><tr>
    <tr><td align="right" valign="top">Job Description:<br><br><i>(Use HTML tags,<br>e.g. &lt;br&gt; as needed)</i></td><td><textarea name="descr" cols="60" rows="10"></textarea></td><tr>
    <tr><td align="right" valign="top">Application<br>Instructions:<br><br><i>(Use HTML tags,<br>e.g. &lt;br&gt; as needed)</i></td><td><textarea name="instr" cols="60" rows="10"></textarea></td><tr>
    <tr><td align="right">Poster Name:</td><td><input type="text" name="poster" size="60" maxLength="127"/></td><tr>
    <tr><td align="right">Poster Email:</td><td><input type="text" name="poster_email" size="60" maxLength="127"/></td><tr>
    <tr><td/><td><span class="boldred">Note: you must provide your name/email.  The system will send you an email message that contains two links.  The first link will activate your posting, the second can be used to update or remove it.</span></td></tr>
    <tr><td/><td><input type="Submit"></td></tr>
    </table>
    </form>
</td></tr>
<?php
    }



    elseif ($action == "revise")
    {
        //  VIEW  //
        $key = $_GET['key'];
        echo "<tr><td align=\"center\" colspan=\"2\"><span class=\"cvprpageheader\">PamiTC/CVPR Job Board - Revise Posting</span><br><br></td></tr>";


        $query  = "SELECT * FROM jobs WHERE idJob=$job_id AND randKey=\"$key\"";
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
    <table border="0" cellpadding="0" cellspacing="0">
    <form action="jobs_processupdate.php" method="post">
    <input type="hidden" name="action" value="process_revise"/>
    <input type="hidden" name="confirmed" value="1"/>
    <input type="hidden" name="job_id" value="<? echo "$job_id"; ?>"/>
    <input type="hidden" name="key" value="<? echo "$key"; ?>"/>
    <tr><td align="right">Job Title:</td><td><input type="text" name="title" size="60" maxLength="127" value="<? echo "$title"; ?>"/></td></tr>
    <tr><td align="right">Company/Institution:</td><td><input type="text" name="org" size="60" maxLength="127" value="<? echo "$org"; ?>"/></td><tr>
    <tr><td align="right">Department:</td><td><input type="text" name="dept" size="60" maxLength="127" value="<? echo "$dept"; ?>"/></td><tr>
    <tr><td align="right">Location:</td><td><input type="text" name="loc" size="60" maxLength="127" value="<? echo "$loc"; ?>"/></td><tr>
    <tr><td align="right" valign="top">Job Description:</td><td><textarea name="descr" cols="60" rows="10"><? echo "$descr"; ?></textarea></td><tr>
    <tr><td align="right" valign="top">Application<br>Instructions:</td><td><textarea name="instr" cols="60" rows="10"><? echo "$instr"; ?></textarea></td><tr>

    <tr><td></td><td>
        <table border="0" cellpadding="0" cellspacing="0"><tr><td>
            <input type="Submit" value="Update Posting"/>
            </form>
        </td><td width="10"/><td>
            <script type="text/javascript">
                function confSubmit(form)
                {
                    if ( confirm( "Are you sure you wish to remove this posting?") )
                    {
                        form.submit();
                    }
                }
            </script>

            <form action="jobs_processupdate.php" method="post">
               <input type="hidden" name="action" value="process_remove"/>
               <input type="hidden" name="job_id" value="<?php echo "$job_id" ?>"/>
               <input type="hidden" name="key" value="<?php echo "$key" ?>"/>
               <input type="button" onClick="confSubmit(this.form)" value="Remove Posting"/>
            </form>
        </td></tr></table>


    </td></tr></table>

    </td></tr>
    </table>

<?php

        }
        else
        {
        }

    }

    elseif ($action == "view" or $action== "preview")
    {
        //  VIEW  //
        echo "<tr><td align=\"center\" colspan=\"2\"><span class=\"cvprpageheader\">PamiTC/CVPR Job Board - Posting Details</span><br><br></td></tr>";
        
        $query  = "SELECT * FROM jobs WHERE idJob=$job_id";
        $result = mysql_query( $query );

        $numrows = mysql_numrows( $result );
        if ($numrows==1)
        {
          $i = 0;
          $job_id     = mysql_result($result,$i,"idJob");
          $title      = mysql_result($result,$i,"title");
          $org        = mysql_result($result,$i,"organization");
          $loc        = mysql_result($result,$i,"location");
          $dept       = mysql_result($result,$i,"department");
          $datePosted = mysql_result($result,$i,"datePosted");
          $dateFormat = date('F j, Y',strtotime($datePosted));
          $descr      = mysql_result($result,$i,"description");
          $instr      = mysql_result($result,$i,"applicationInstructions");
          //$name       = mysql_result($result,$i,"applicationInstructions");
    
          echo "<tr><td><i>Title:</i> <b><u>$title</u></b></td><td width=\"35%\" align=\"right\"><i>Posted:</i> $dateFormat</td></tr>";
          echo "<tr><td colspan=\"2\"><i>Company/Institution:</i> $org</td></tr>";
          echo "<tr><td colspan=\"2\"><i>Location:</i> $loc</td></tr>";
          if ($dept != "")
          {
            echo "<tr><td colspan=\"2\"><i>Department:</i> $dept</td></tr>";
          }
          echo "<tr><td colspan=\"2\"><hr><i>Description:</i> $descr</td></tr>";
          echo "<tr><td colspan=\"2\"><hr><i>Application Instructions:</i> $instr</td></tr>";
          if ($action=="preview")
          {
              $key = $_GET['key'];
?>
<tr><td colspan="2">
    <table border="0" cellpadding="0" cellspacing="0"><tr><td>
        <form action="jobs_handle.php" method="get">
           <input type="hidden" name="action" value="revise"/>
           <input type="hidden" name="job_id" value="<?php echo "$job_id" ?>"/>
           <input type="hidden" name="key" value="<?php echo "$key" ?>"/>
           <input type="Submit" value="Modify Further"/>
        </form>
    </td><td width="10"/><td>
        <form action="jobs.php" method="get">
           <input type="hidden" name="action" value="finished_revising"/>
           <input type="Submit" value="All Done"/>
        </form>
</td></tr>
<?php
          }
          echo "</table>";
        }
        else
        {
          echo "Message appears to have been removed.";
        }


    }



    else
    {
        //  LIST  //
        echo "<tr><td align=\"center\" colspan=\"2\"><span class=\"cvprpageheader\">PamiTC/CVPR Job Board ($numrows Postings)</span><br><br>"
?>
    <form action="jobs.php" method="get">
       <input type="hidden" name="action" value="new"/>
       <input type="submit" value="New Posting"/>
    </form>
<?php
        echo "<br></td></tr>";
      
        echo "<tr><td><b><u>Job Details</u></b><br><br></td><td width=\"25%\" align=\"center\"><b><u>Date Posted/Updated</u></b><br><br></td</tr>";
        $i = 0;
        $shade = true;
        while ( $i < $numrows )
        {
            $job_id     = mysql_result($result,$i,"idJob");
            $title      = mysql_result($result,$i,"title");
            $org        = mysql_result($result,$i,"organization");
            $loc        = mysql_result($result,$i,"location");
            $datePosted = mysql_result($result,$i,"datePosted");
            $descr      = mysql_result($result,$i,"description");
            $descr      = strip_tags(substr($descr,0,256))."...";
            $dateFormat = date('F j, Y',strtotime($datePosted));
            $shade_str = "bgcolor=\"#FFFFFF\"";
            if ($shade) { $shade_str = "bgcolor=\"#DDDDDD\""; }
            $shade = !$shade;
            echo "<tr $shade_str height=\"5\"/><td colspan=\"2\"/></tr>";
            echo "<tr $shade_str valign=\"top\"><td><a href=\"jobs.php?action=view&job_id=$job_id\"><b>$title</b></a> (<b>$org</b> - $loc)</td><td align=\"center\">$dateFormat</td></tr>";
            //echo "<tr $shade_str><td><a href=\"jobs.php?action=view&job_id=$job_id\"><b>$title</b></a></td><td align=\"center\">$dateFormat</td></tr>";
            //echo "<tr $shade_str><td colspan=\"2\"><b>$org</b>, $loc</td></tr>";
            echo "<tr $shade_str><td colspan=\"2\"><font size=\"-1\">$descr</font></td></tr>";
            echo "<tr $shade_str height=\"5\"/><td colspan=\"2\"/></tr>";
            $i++;
        }
        echo "</table>";
        echo "</center>";

        if ($ALERT_MSG != "")
        {
echo "<script type=\"text/javascript\">";
echo "window.onload = function() {";
echo "    alert(\"$ALERT_MSG\"); };";
echo "</script>";
        }
    }

?>


</td></tr>
</table>
<br><br>
</center>


<?php
    include('common_footer.php');
?>


