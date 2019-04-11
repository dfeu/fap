<?php
echo "<pre>";
echo shell_exec("sudo iptables -vnL");
echo "<hr>";
echo shell_exec("sudo iptables -t nat -vnL");
echo "<hr>";
echo shell_exec("sudo ipset list WL");
echo "</pre>";

echo "<p>";
echo "<a href=./index.php>Zurück</a>";




?>


