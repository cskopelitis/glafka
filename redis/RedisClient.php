<?php
require_once '../conf/app.conf.php';
require_once '../Predis/Autoloader.php';

abstract class RedisClient {

  protected $redis;

  protected function __construct(){
    Predis\Autoloader::register();
    $this->redis=new Predis\Client($GLOBALS['redis.url']);
  }

}
?>