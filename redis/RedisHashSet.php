<?php
namespace redis;

require_once 'redis/RedisClient.php';

abstract class RedisHashSet extends RedisClient {

  private $id;

  protected function __construct($id){
    $this->id=$id;
  }

  public function getId() {
    return $this->id;
  }
  
  public abstract function getIdPrefix();

  private function buildKey(){
    return $this->getIdPrefix() . $this->id;
  }

  public function __get($key){
    return parent::getInstance()->hget(self::buildKey(),$key);
  }

  public function __set($key,$value){
    parent::getInstance()->hset(self::buildKey(),$key,$value);
  }

}