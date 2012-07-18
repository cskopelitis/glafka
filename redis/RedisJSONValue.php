<?php
namespace redis;

abstract class RedisJSONValue {
 
 public abstract function asJSON();
 
}

class RedisGenericJSONValue extends RedisJSONValue {

  private $value;

  public function __construct($value){
    $this->value=$value;
  }

  public function asJSON(){
    return $this->value;
  }
  
}
?>