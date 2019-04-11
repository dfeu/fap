<?php

$wahl=$_GET['msg'];

$file = "/etc/unbound/unbound.conf.d/whitelist.conf";
$handle = fopen($file,"a");

foreach ($wahl as $item) {
	echo "<p>";
	echo "Sie haben $item gewählt.";
	$datei="./messenger/".$item.".txt";
	echo "<br>";
	echo "Lese geeignete Quelldatei $datei ein...:";
	$fqdn = file($datei);
	echo "<br>";
	echo "Schreibe Inhalt in Whitelist...<p>";
	foreach ($fqdn as $line) {
		$line=trim($line);
		echo "Füge <b>$line</b> hinzu<br>";
		$cur = "\nlocal-zone: \"$line\" transparent\n";
		if (strlen($line)>1) {
			echo $cur;
			fwrite($handle, $cur);
			echo "<br>";
		} else {
			echo "<b>Fehlerhafter Eintrag von ->$line<-, bitte Datei $datei prüfen</b>";
		}
	}
	echo "<hr>";

}
shell_exec('sudo systemctl restart unbound');

echo "<p>";
echo "<a href=./index.php>Zurück</a>";
echo "<p>";


?>
