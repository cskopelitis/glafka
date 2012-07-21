<?php
namespace plexus;

use logger\Logger;
require_once 'util/Logger.php';

use redis\RedisClient;
require_once 'redis/RedisClient.php';

use services\session\Session;
require_once 'notification/model/Session.php';

use security\AuthenticationModule;
require_once 'security/AuthenticationModule.php';
require_once 'security/model/User.php';
use exception\AuthenticationException;
require_once 'exception/AuthenticationException.php';

class Plexus {

  private static $_instance;

  private $redisClient;

  private function __construct(){
    $redisClient=RedisClient::getInstance();
  }

  public static function instruct(){
    if(!self::$_instance){
      self::$_instance=new Plexus();
    }
    return self::$_instance;
  }

  public function requestJoin($username,$password){
    // retrieve the user from the database
    $user=new \security\User($username);

    // authorize
    AuthenticationModule::getInstance()->authorize($user, $password);

    // create session
    $session=Session::startOrResume($user->getId());
    $user->sessionId=session_id();
    
    // register in all channels
    // JAVA
  }
  
}