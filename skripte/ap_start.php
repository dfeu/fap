<?php
$f="/var/www/html/mitschnitt.pcap";

$str = "sudo tshark -i wlan0 -w /var/www/html/mitschnitt.pcap &";

if (file_exists($f)) {
	echo "Reste der vorherigen Aufzeichnung vorhanden, oder Aufzeichnung läuft";
	echo "<br><a href=ap_stop.php>Aufzeichnung stoppen</a>";

} else {
	shell_exec($str);
}

echo "<p>";
echo "<a href=../index.php>Zurück</a>";


?>
