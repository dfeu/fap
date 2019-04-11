<?php

echo "Es kann zu Problemen kommen, hier finden sich ein paar Lösungen:";

echo "<p>";
echo "<b>Namensauflösung schlägt fehl:</b><br>";
echo "Zeitabweichung zu groß zu den root-servern.";
echo "<br>Aktuelle Uhrzeit: ";
$datum = date("d.m.Y");
$uhrzeit = date("H:i");
echo $datum," - ",$uhrzeit," Uhr";
echo "<br>";
echo "<a href=./skripte/ntp.php>Korrigieren</a>";
echo "<p>";
echo "<b>Kein gültiger Zeitserver gefunden:</b>";
echo "<br><a href=../eigenen_ntp.html>Eigenen NTP-Server eintragen</a>";

?>
