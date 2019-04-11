<?php

echo "Starte tshark zur Überwachung des DNS-Verkehrs";
#shell_exec("/home/pi/dns2ip.sh &");
shell_exec("sudo tshark -i wlan0 -f \"src port 53\"  -l -T fields -e dns.a  > /home/pi/dns &");
echo "<p>";
echo "<a href=./index.php>Zurück</a>";

?>
