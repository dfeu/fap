<?php
echo "Inhalt der Logdatei";
echo "<pre>";
echo shell_exec("sudo journalctl -r -u unbound");



?>
