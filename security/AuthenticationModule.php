<?php
namespace security;

use logger\Logger;
require_once 'util/Logger.php';

use \redis\RedisClient;
require_once 'redis/RedisClient.php';
require_once 'security/model/User.php';

class AuthenticationModule extends RedisClient {

 const OK=100;
 const UNKNOWN_USER=-100;
 const AUTH_FAILED=-200;

 public function __construct(){
  parent::__construct();
 }

 public function authorize($username,$providedPassword){
  $internalUserId=$this->redis->get($username);
  
  // check if there IS a user by this username
  if($internalUserId==null){
   return self::UNKNOWN_USER;
  }

  $user=new User($internalUserId);
  $userPassword=$user->password;
  
  if($userPassword==null || $userPassword!==$providedPassword ){
   return self::AUTH_FAILED;
  }

  return self::OK;
 }

 private function initUserSession($internalUserId) {
  // update active sessions
  // update session variables
  $_SESSION['userId']=$internalUserId;
 }

}