<?php
namespace security;

use logger\Logger;
require_once 'util/Logger.php';
use redis\RedisHashSet;
require_once 'redis/RedisHashSet.php';

class Session extends RedisHashSet {

  public function __construct($id){
    parent::__construct($id);
  }

  public static function startOrResume($username){
    session_start();
    $session=new Session(session_id());
    $session->username=$username;
    return $session;
  }

  public function getIdPrefix(){
    return '';
  }

}