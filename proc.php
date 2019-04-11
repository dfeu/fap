<?php

echo "<pre>";

$menge=shell_exec("sudo ps -ef | grep -iE \"dumpcap|tshark\"");
if (strlen($menge)<300) {
	echo "Keine Prozesse gefunden";
} else {
	echo $menge;
}
echo "</pre>";
#echo $menge;
#echo strlen($menge);

echo "<p>";
echo "<a href=./index.php>Zurück</a>";

?>
