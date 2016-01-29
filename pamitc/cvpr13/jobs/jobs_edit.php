<html>
  <head>
    <title>Jobs</title>
  </head>
  <body>
<form action='jobs_processupdate.php' method='post' name='frm'>
<?
    $id  = $_GET['id'];
    $key = $_GET['key'];
    $action = $_GET['action'];
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type='hidden' name='key' value='$key'>";
echo "<input type='hidden' name='action' value='$action'>";
?>
</form>
<script language="JavaScript">
document.frm.submit();
</script>
<?
?>
    
  <body>
</html>
