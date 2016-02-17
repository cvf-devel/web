<html>
  <head>
    <title>Jobs</title>
  </head>
  <body>

<?php
$job_id  = $_GET["job_id"];
$key = $_GET["key"];
$action = $_GET["action"];
$target = "jobs_processupdate.php";
$method="post";
if ( $action == "revise" )
{
    $target="jobs.php";
    $method="get";
}
echo "<form action=\"$target\" method=\"$method\" name=\"frm\">";
echo "<input type=\"hidden\" name=\"job_id\" value=\"$job_id\">";
echo "<input type=\"hidden\" name=\"key\" value=\"$key\">";
echo "<input type=\"hidden\" name=\"action\" value=\"$action\">";
?>
</form>
<script type="text/javascript">
document.frm.submit();
</script>
    
  <body>
</html>
