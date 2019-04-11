<?php
echo "Empfangene Domain:";
echo $_POST['host'];
$h = $_POST['host'];
$file = "/etc/unbound/unbound.conf.d/whitelist.conf";
$handle = fopen($file,"a");

$cur = "\nlocal-zone: \"$h\" transparent";
echo "<p>"; 
fwrite($handle, $cur);
echo $cur;
shell_exec('sudo systemctl restart unbound');

echo "<p>";
echo "<a href=./index.php>Zurück</a>";

?>

