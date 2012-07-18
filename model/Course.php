<?php
namespace business;

use redis\RedisHashSet;
require_once 'redis/RedisHashSet.php';

class Course extends RedisHashSet {

 public function __construct($objectId){
  parent::__construct('c' . $objectId);
 }

 public function getSubject() {
  return new Subject($this->subjectId);
 }

 public static function initDb() {
  $tempCourse=new Course(1);
  $tempCourse->name='A1';
  $tempCourse->subjectId=1;
  
  $tempCourse=new Course(2);
  $tempCourse->name='B1';
  $tempCourse->subjectId=1;
 }

}