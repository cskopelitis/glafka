<?php
namespace business;

use redis\RedisHashSet;
require_once 'redis/RedisHashSet.php';

class Subject extends RedisHashSet {

 public function __construct($id){
  parent::__construct('s' . $id);
 }

 public function getName() {
  return $this->get('name');
 }

 public static function initDb() {
  $tmpSubject=new Subject(1, 'Math');
  $tmpSubject=new Subject(2, 'Physics');
  $tmpSubject=new Subject(3, 'Chemistry');
  $tmpSubject=new Subject(4, 'History');
  $tmpSubject=new Subject(5, 'Geography');
 }
}
?>