<?php

echo "Der Standard wird wiederhergestellt";

shell_exec("sudo cp whitelist_def.orig /etc/unbound/unbound.conf.d/whitelist.conf");
shell_exec("sudo chmod 666 /etc/unbound/unbound.conf.d/whitelist.conf");
shell_exec("sudo systemctl restart unbound");
;
echo "<p>";
echo "<a href=./index.php>Zurück</a>";

?>
