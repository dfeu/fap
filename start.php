<?php
echo "Die Aufzeichnung wurde <b>gestartet</b>";
echo "<p>";
echo "Dieses Fenster schließen und die Startseite mit -F5- neu laden";

?>
<?php

shell_exec("sudo ./dns2ip.sh > /dev/null 2>/dev/null &");
#shell_exec("sudo tshark -i wlan0 -f \"src port 53\"  -l -T fields -e dns.a  > /home/pi/dns &");

?>
