<?php
namespace security;

use \redis\RedisClient;
require_once 'redis/RedisClient.php';
use conf;
require_once 'conf/app.conf.php';
require_once 'security/model/User.php';

class AuthenticationModule extends RedisClient {

  const UNKNOWN_USER=-100;
  const AUTH_FAILED=-200;

  public function __construct(){
    parent::__construct();
  }

  public function authorize($username,$providedPassword){
    $internalUserId=$this->redis->get($username);

    // check if there IS a user by this username
    if($internalUserId==null){
      return UNKNOWN_USER;
    }

    $user=new User($internalUserId);
    $userPassword=$user->password;

    // TODO crypt() - the password should be encrypted
    if($userPassword==null || !($userPassword===$providedPassword) ){
      return AUTH_FAILED;
    }

    return $internalUserId;
  }

  private function initUserSession($internalUserId) {
    // update active sessions
    // update session variables
    $_SESSION['userId']=$internalUserId;
  }

}
?>