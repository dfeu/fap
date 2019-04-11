<?php

shell_exec("sudo killall tshark");
shell_exec("sudo mv ../mitschnitt.pcap ../mitschnitt_finished.pcap");
shell_exec("sudo chmod 744 ../mitschnitt_finished.pcap");
echo "<a href=../mitschnitt_finished.pcap>Mitschnitt herunterladen</a>";
echo "<p>";
echo "<a href=../index.php>Zurück</a>";

?>
