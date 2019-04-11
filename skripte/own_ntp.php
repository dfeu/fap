<?php
$ip = $_POST['ntp'];
echo "Trage $ip in zeitserver.txt ein";
$file = "./zeitserver.txt";
$handle = fopen($file,"a");
fwrite($handle,$ip);
fwrite($handle,"\n");
fclose($handle);
	
	
echo "<br>Aktuelle Uhrzeit: ";
$datum = date("d.m.Y");
$uhrzeit = date("H:i");
echo $datum," - ",$uhrzeit," Uhr";
echo "<p>";
echo "Aktualisiere Uhrzeit (von neuen Zeitserver per IP)";
shell_exec("sudo ntpdate $ip");
echo "<br>Aktuelle Uhrzeit: ";
$datum = date("d.m.Y");
$uhrzeit = date("H:i");
echo $datum," - ",$uhrzeit," Uhr";
echo "<p>";
echo "<a href=../index.php>Zurück</a>";#
##
?>
