<?php
# erst das dns2ip-Skript, sonst läuft die inotifywait-Geschichte immer weiter ...

echo "Kille die Untersuchung";

# dns2ip.sh
#$a = shell_exec("sudo pidof -x dns2ip.sh");
#echo $a;
#$arr=explode(" ",$a);
#echo count($arr);

#foreach ($arr as $x) {
#	shell_exec("sudo kill -9  ".$x);
#}
#inotifywait
#shell_exec("sudo killall inotifywait");

# tshark
shell_exec("sudo killall tshark");

echo "<p>";
echo "<a href=./index.php>Zurück</a>";#
##
?>
