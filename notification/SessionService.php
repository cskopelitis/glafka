<?php
namespace services\session;

class SessionService {

  private static $_instance;

  private function __construct(){
  }

  public static function getInstance() {
    if(!self::$_instance){
      self::$_instance=new SessionService();
    }
    return self::$_instance;
  }
  
  public function createSession(){
  }

  public function fetchSession(){
  }

  public function deleteSession(){
  }

  public function expireSession(){
  }
}