<?php
$f="/etc/unbound/unbound.conf.d/whitelist.conf";
$m="./whitelist_user.conf";
if (file_exists($f)) {
	echo "Dies ist die aktuelle Whitelist:<br>";
	getWhitelist($f);
}
else
{
	echo "Zeige die deaktivierte Whitelist<br>";
	getWhitelist($m);
}
getWhitelist($f);


function getWhitelist($datei)
{
		$inhalt = file_get_contents($datei);

			$domains = explode("local-zone",$inhalt);
			for($i = 2; $i < count($domains); ++$i) {
							echo $domains[$i];
										echo "<br>";
								}
}
