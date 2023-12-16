<?php

use Bt51\NTP\Socket;
use Bt51\NTP\Client;

$socket = new Socket('0.pool.ntp.org', 123); 
$ntp = new Client($socket);
$time = $ntp->getTime();
echo $time
