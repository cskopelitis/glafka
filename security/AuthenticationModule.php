<?php
namespace security;

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
  $firephp = \FirePHP::getInstance(true);
  $internalUserId=$this->redis->get($username);

  $firephp->log('$providedPassword=' . $providedPassword);
  
  // check if there IS a user by this username
  if($internalUserId==null){
   return $this::UNKNOWN_USER;
  }

  $user=new User($internalUserId);
  $userPassword=$user->password;
  
  if($userPassword==null || $userPassword!==$providedPassword ){
   return $this::AUTH_FAILED;
  }

  return $this::OK;
 }

 private function initUserSession($internalUserId) {
  // update active sessions
  // update session variables
  $_SESSION['userId']=$internalUserId;
 }

}