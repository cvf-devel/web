<html>
  <head>
    <title>Jobs</title>
  </head>
  <body>

    <form action="jobs_processupdate.php" method="post">
    <input type="hidden" name="action" value="new"/>
    <table>
    <tr><td align="right">Job Title:</td><td><input type="text" name="title" size="80" maxLength="127"/></td></tr>
    <tr><td align="right">Organization (Company/Institution):</td><td><input type="text" name="org" size="80" maxLength="127"/></td><tr>
    <tr><td align="right">Department:</td><td><input type="text" name="dept" size="80" maxLength="127"/></td><tr>
    <tr><td align="right">Location:</td><td><input type="text" name="loc" size="80" maxLength="127"/></td><tr>
    <tr><td align="right" valign="top">Job Description:</td><td><textarea name="descr" cols="80" rows="10"></textarea></td><tr>
    <tr><td align="right" valign="top">Application Instructions:</td><td><textarea name="instr" cols="80" rows="10"></textarea></td><tr>
    <tr><td align="right">Poster Name:</td><td><input type="text" name="poster" size="80" maxLength="127"/></td><tr>
    <tr><td align="right">Poster Email:</td><td><input type="text" name="poster_email" size="80" maxLength="127"/></td><tr>
    <tr><td/><td><input type="Submit"></td></tr>
    </table>
    </form>
    
  <body>
</html>
