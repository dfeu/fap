<?php
$secure = 1;
$aufzeichnung=0;
$f="/etc/unbound/unbound.conf.d/whitelist.conf";

echo "<h1>Forensic Access Point - Startseite</h1>";
echo "<table border=1><tr> <th colspan=\"2\">Übersicht</th></tr>";
echo "<tr><td>IP-Adresse</td><td>";
$ip = shell_exec("ifconfig br0");
$anfang = strpos($ip,"inet")+4;
echo substr($ip,$anfang,strpos($ip,"netmask")-$anfang);	
echo "</td></tr>";
echo "<tr><td>SSID WLAN</td><td>";

$ssid= shell_exec("grep passphrase /etc/hostapd.conf ");
echo substr($ssid,15);
echo "</td></tr>";
echo "<tr> <td colspan=\"2\"><center><b>Firewall</b></center></td></tr>";
echo "<tr><td>Status</td> <td>";
$menge = shell_exec("sudo iptables -L | wc -l");
if ($menge >10) {
	echo "<span style=\"color:#298A08\">aktiv<br></span>";
} else {
	echo "<span style=\"color:#FF0000\">deaktiviert<br></span>";
	$secure=0;
}
echo "</td></tr>";
$ipset= shell_exec("sudo ipset list WL|wc -l");
$ips = intval($ipset)-8;
echo "<tr><td>Anzahl der IPs</td><td>$ips</td></tr>";
echo "<tr><td colspan=\"2\"><center><b>DNS-Whitelist</b></center></td></tr>";
echo "<tr><td>Status</td><td>";
if  (file_exists($f)) {
	echo "<span style=\"color:#298A08\"> aktiv<br></span>";
#	getWhitelist($f);
} else {
	echo "<span style=\"color:#FF0000\"> deaktiviert<br></span>";
	$secure = 0;
}
echo "</td></tr>";
echo "<tr><td colspan=\"2\"><center><b>Mirroring</b></center></td></tr>";
echo "<tr><td>Status</td><td>";
	
$ovs = shell_exec("sudo ovs-vsctl list Mirror mirror1");
if (count($ovs)!=1) {
	echo "<span style=\"color:#FF0000\"> deaktiviert<br></span>";
} else {
	echo "<span style=\"color:#298A08\"> aktiv<br></span>";
}
	
	
echo "</td></tr>";

echo "<tr><td colspan=\"2\"><center><b>Pipeline zur Überwachung</b></center></td></tr>";
echo "<tr><td>Status</td><td>";

if  (file_exists("/home/pi/dns")) {
	echo "<span style=\"color:#298A08\"> existent<br></span>";
} else {
	echo "<span style=\"color:#FF0000\"> fehlt<br></span>";
	echo "Bitte \"sudo mkfifo /home/pi/dns\" in der Konsole eingebe";
}

echo "</td></tr>";
echo "<tr><td colspan=\"2\"><center><b>Untersuchung</b></center></td></tr>";
echo "<tr><td>Status</td><td>";
$menge=shell_exec("sudo ps -ef | grep -iE \"inotifywait|dumpcap|dns2ip|tshark\"");
if (strlen($menge)<400) {
	echo "<span style=\"color:#FF0000\"> deaktiviert<br></span>";
} else {
	echo "<span style=\"color:#298A08\"> aktiv<br></span>";
	$aufzeichnung=1;
}




echo "</td></tr></table>";




echo "<h3>Status Aufzeichnung</h3>";
if ($aufzeichnung==1) {
	echo "Aufzeichnung läuft";
	echo "<br>Die folgenden Seiten sind erreichbar:<br>";
	getWhitelist($f);
	echo "<br><a href=./kill.php>Aufzeichnung stoppen</a>";
} else {
if ($secure != 0) {
	echo "Das abgesicherte Surfen ist zu den folgenden Seiten möglich:<p>";
	getWhitelist($f);
	echo "<p><a href=start.php>Start der Untersuchung</a>";
} else {
	echo "Sicheres Abrufen der Daten <b>NICHT</b> möglich";
}
}

echo "<hr>";
echo "<a href=./toggle.php>Whitelist ein/ausschalten</a><br>";
echo "<a href=./template.php>Templates aktivieren</a><br>";
echo "<a href=./dns_change.html>Whitelist bearbeiten</a><br>";
echo "<a href=./dns_show.php>Whitelist anzeigen</a><br>";
echo "<a href=./dns_default.php>Default wiederherstellen</a><br>";
echo "<a href=./log.php>Logfiles</a><br>";

echo "<hr>";

echo "<a href=./fw_reset.php>Firewall umschalten</a><br>";
echo "<a href=./fw_stats.php>Firewalldetails</a>";
echo "<hr>";
echo "<a href=./proc.php>Status</a><br>";
echo "<a href=./munin/>Munin Monitoring</a><br>";
echo "<a href=./wlan_ap.php>WLAN-AP only</a><br>";
echo "<a href=./probleme.php>Problembehebung</a>";
function getWhitelist($datei)
{
	$inhalt = file_get_contents($datei);

	$domains = explode("local-zone",$inhalt);
	for($i = 2; $i < count($domains); ++$i) {
			echo $domains[$i];
			echo "<br>";
	}
}

function getMirror()
{
$ovs = shell_exec("sudo ovs-vsctl list Mirror mirror1");
if (count($ovs)!=1) {
	echo "<span style=\"color:#FF0000\"> deaktiviert<br></span>";
} else {
	echo "<span style=\"color:#298A08\"> aktiv<br></span>";
}
}
?>
