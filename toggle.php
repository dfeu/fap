<?php
$file = "/etc/unbound/unbound.conf.d/whitelist.conf";


$status = getStatus($file);
toggle($status);
if ($status == 1) {
	echo "Status geändert, Whitelist deaktiviert";
} else {
	echo "Status geändert, Whitelist aktiviert";
}




function getStatus($f) {
# whitelist da oder nicht?
if (file_exists($f)) {
	$x=1;
} else {
	$x=0;
}
return $x;
}

function toggle($status) {
	if ($status==1) {	# Whitelist aktiv
		shell_exec("sudo mv /etc/unbound/unbound.conf.d/whitelist.conf whitelist_user.conf");
		#shell_exec("sudo rm /etc/unbound/unbound.conf.d/whitelist.conf");
	} else {
		shell_exec("sudo cp whitelist_user.conf /etc/unbound/unbound.conf.d/whitelist.conf");
	}
shell_exec("sudo chmod 666 /etc/unbound/unbound.conf.d/whitelist.conf");
shell_exec("sudo systemctl restart unbound");
}
echo "<p>";
echo "<a href=./index.php>Zurück</a>";

?>
