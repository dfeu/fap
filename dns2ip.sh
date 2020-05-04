#!/bin/bash

# Dr. Daniel Spiekermann

# tshark starten
echo "gestartet"
sudo tshark -i wlan0 -f "src port 53"  -l -T fields -e dns.a  > /home/pi/dns& 





