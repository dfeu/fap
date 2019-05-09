<html>
<head>
<title>Systemeingriffe</title>
<?php if (isset($_POST['reboot']))
{
	shell_exec("sudo reboot");
	}
if (isset($_POST['shutdown']))
{
	exec("sudo shutdown -h now");
}
?>
</head>
<body>
<a href="../">zur&uuml;ck</a><br>
  <form method="post">
    <button name="reboot">FAP neustarten</button><br>
<p>
    <button name="shutdown">FAP herunterfahren</button><br>
  </form>
</form>
</body>
</html>
