<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache'); // recommended to prevent caching of event data.

function sendMsg($id, $msg) {
 echo "id: $id" . PHP_EOL;
 echo "data: $msg" . PHP_EOL;
 echo PHP_EOL;
 ob_flush();
 flush();
}

echo 'Begin ...<br />';
for( $i = 0 ; $i < 10 ; $i++ )
{
 $serverTime = time();
 sendMsg($serverTime, 'server time: ' . date("h:i:s", time()));
 sleep(1);
}
echo 'End ...<br />';
?>

