<?php
require_once 'RedisClient.php';

class RedisHashSet extends RedisClient {

  protected $objectId;

  public function __construct($objectId){
    parent::__construct();
    $this->objectId=$objectId;
  }

  public function getObjectId() {
    return $this->objectId;
  }

  public function __get($key){
    return $this->redisGet($key);
  }

  public function __set($key,$value){
    $this->redisSet($key, $value);
  }

  private function redisGet($key){
    return $this->redis->hget($this->objectId,$key);
  }

  private function redisSet($key,$value){
    return $this->redis->hset($this->objectId,$key,$value);
  }

}
?>