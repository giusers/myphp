<?php
function ntp($server,$port=123){
  echo $server;
  $socket=@fsockopen("udp://$server",$port,$err_no,$err_str,1);
  if(!$socket)return;
  fwrite($socket,chr(0x1b).str_repeat("\0",47));
  $packetReceived=fread($socket,48);
  $unixTimestamp=unpack('N',$packetReceived,40)[1]-2208988800;
  $utcDate=date("Y-m-d H:i:s",$unixTimestamp);
  echo ":<b>$utcDate</b><br/>\n";
}
echo "good";
ntp('time.cloudflare.com');
phpinfo();
