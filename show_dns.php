<?php
$homepage = file_get_contents('/etc/unbound/unbound.conf.d/whitelist.conf');
#echo $homepage;
$domains = explode("local-zone",$homepage);
echo "<h2>Freigeschaltete Domains</h2>";
echo "<br>";
for($i = 2; $i < count($domains); ++$i) {
	echo "<br>";
echo $domains[$i];
}
?>
