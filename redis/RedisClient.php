<?php
namespace redis;

require_once 'Predis/Autoloader.php';

use conf;
require_once 'conf/app.conf.php';

use Predis\Autoloader;

abstract class RedisClient {

  protected $redis;

  protected function __construct(){
    Autoloader::register();
    $this->redis=new \Predis\Client($GLOBALS['redis.url']);
  }

}