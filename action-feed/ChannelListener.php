<?php
require_once 'redis/RedisClient.php';

class ChannelListener extends RedisClient {

 public function __construct() {
  parent::__construct();
  $this->redis->subscribe('c1', 'ChannelListener::onMessage');
 }
 
 public static function onMessage($chan,$msg){
  echo '$chan -- $msg';
 }
}
?>