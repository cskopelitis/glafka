<?php
namespace redis;

require_once 'Predis/Autoloader.php';

use conf;
require_once 'conf/app.conf.php';

use Predis\Autoloader;

class RedisClient {

  private static $_instance;

  private $redis;

  private function __construct(){
    Autoloader::register();
    $this->redis=new \Predis\Client($GLOBALS['redis.url']);
  }

  public static function getInstance() {
    if(!self::$_instance){
      self::$_instance=new RedisClient();
    }
    return self::$_instance;
  }

  public function __call($method,$arguments){
    return $this->redis->__call($method, $arguments);
  }

}