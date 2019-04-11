<?php


echo "<h1>Wählen Sie hier die Messenger, die sie freischalten wollen...</h1>";
echo "<p>";
echo "<form action=\"./template_check.php\">";
echo "<table border=1><tr><th>Dienst</th><th>aktivieren</th></tr>";
echo "<tr><td><img src=./pics/whatsapp.jpg width=80 height=80></td> <td> <input type=\"checkbox\" name=\"msg[]\" value=\"wa\">WhatsApp<br>";
echo "<tr><td><img src=./pics/facebook.png width=80 height=80></td> <td> <input type=\"checkbox\" name=\"msg[]\" value=\"fb\">Facebook<br>";
echo "<tr><td><img src=./pics/line.png width=80 height=80></td> <td> <input type=\"checkbox\" name=\"msg[]\" value=\"line\">Line<br>";
echo "<tr><td><img src=./pics/knuddels.jpg width=80 height=80></td> <td> <input type=\"checkbox\" name=\"msg[]\" value=\"knuddels\">Knuddels<br>";
echo "<tr><td><img src=./pics/snapchat.png width=80 height=80></td> <td> <input type=\"checkbox\" name=\"msg[]\" value=\"sc\">Snapchat<br>";
echo "<tr><td><input type=\"submit\" value=\"Senden\"></td></tr>";
echo "</table>";

echo "</form>";

?>
