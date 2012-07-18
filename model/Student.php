<?php
require_once 'redis/RedisHashSet.php';

class Student extends RedisHashSet {

 public function __construct($username){
  parent::__construct($username);
 }

 public function __get($key){
  return $this->get($key);
 }

 public function __set($key,$value){
  $this->set($key, $value);
 }

}