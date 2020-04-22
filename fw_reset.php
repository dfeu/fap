<?php
$menge = shell_exec("sudo iptables -L | wc -l");
#echo $menge;

if ($menge >10) {
	echo "Deaktiviere die Firewall";
	shell_exec("sudo iptables -P INPUT ACCEPT");
	shell_exec("sudo iptables -P OUTPUT ACCEPT");
	shell_exec("sudo iptables -P FORWARD ACCEPT");

	shell_exec("sudo iptables -F INPUT");
	shell_exec("sudo iptables -F OUTPUT");
	shell_exec("sudo iptables -F FORWARD");
	shell_exec("sudo ipset flush WL");
} else {
	echo "Aktiviere die Firewall";
	shell_exec("sudo iptables-restore < /home/pi/src/forward.txt");
}

echo "<p>";
echo "<a href=./index.php>Zurück</a>";



?>	
