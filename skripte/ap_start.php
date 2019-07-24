<html>
<head>
<title>Systemeingriffe</title>
<?php 
		$u="/var/www/html/mitschnitt_neu.pcap";
		if (file_exists($u)) {
			echo "Aufzeichnung läuft...";
		}		
if (isset($_POST['start']))
{
		$u="/var/www/html/mitschnitt_neu.pcap";
		if (file_exists($u)) {
			echo "Datei vorhanden, d.h. Aufzeichnung läuft, oder Reste vorhanden";
		} else {
			exec("sudo dumpcap -w /var/www/html/mitschnitt_neu.pcap > /dev/null 2>/dev/null &");
			$page = $_SERVER['PHP_SELF'];
			$sec = "3";
			header("Refresh: $sec; url=$page");
		}
}

if (isset($_POST['stop']))
{
		shell_exec("sudo killall -s SIGINT dumpcap");
		sleep(3);
		shell_exec("sudo killall dumpcap");
		echo "<p>";
		echo "Process stopped";
		shell_exec("sudo mv ../mitschnitt_neu.pcap ../mitschnitt_finished.pcap");
		if (!file_exists($u)) {
			echo "<p>Aufzeichnung korrekt beendet";
		}
		echo "<p>";
		shell_exec("sudo chmod 744 ../mitschnitt_finished.pcap");
		echo "<a href=../mitschnitt_finished.pcap>Mitschnitt herunterladen</a>";
		echo "<p>";
}		
?>
</head>
<body>
<a href="../">zur&uuml;ck</a><br>
  <form method="post">
    <button name="start">Aufzeichnung starten</button><br>
<p>
    <button name="stop">Aufzeichnung stoppen</button><br>
  </form>
</form>
</body>
</html>
