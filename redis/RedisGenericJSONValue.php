<?php
require_once 'RedisJSONValue.php';

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