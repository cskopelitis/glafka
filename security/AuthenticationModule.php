<?php
namespace security;

use logger\Logger;
require_once 'util/Logger.php';
use \redis\RedisClient;
require_once 'redis/RedisClient.php';
use exception\AuthenticationException;
require_once 'exception/AuthenticationException.php';

require_once 'security/model/User.php';

class AuthenticationModule extends RedisClient {
  private static $_instance;

  private function __construct(){
  }

  public static function getInstance(){
    if(!self::$_instance){
      self::$_instance=new AuthenticationModule();
    }
    return self::$_instance;
  }

  public function authorize($user,$providedPassword){
    $userPassword=$user->password;
    Logger::var_dump('userPassword', $userPassword);

    if($userPassword==null){
      throw new AuthenticationException(AuthenticationException::UNKNOWN_USER);
    }
    else if($userPassword!==$providedPassword ){
      throw new AuthenticationException(AuthenticationException::AUTH_FAILED);
    }
  }

}