<?php
echo "<br>Aktuelle Uhrzeit: ";
$datum = date("d.m.Y");
$uhrzeit = date("H:i");
echo $datum," - ",$uhrzeit," Uhr";
echo "<p>";
$file = fopen("./zeitserver.txt","r");
while (!feof($file)) {
	$line=fgets($file);
	if (strlen($line)<4) {
		break;
	}
	echo "<br>Verbinde mich mit $line";
	shell_exec("sudo ntpdate $line");
}
echo "<br>Aktuelle Uhrzeit: ";
$datum = date("d.m.Y");
$uhrzeit = date("H:i");
echo $datum," - ",$uhrzeit," Uhr";
echo "<p>";
echo "<a href=../index.php>Zurück</a>";#
##
?>
