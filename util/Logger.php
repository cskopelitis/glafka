<?php
/*
 * @see http://thinkvitamin.com/code/how-to-debug-in-php/
*/
namespace logger;

require_once('FirePHPCore/FirePHP.class.php');

class Logger {
  private static $firephp;

  public static function debug($message){
    self::getInstance()->log($message);
  }

  private static function getInstance() {
    if(self::$firephp==null){
      self::$firephp=\FirePHP::getInstance(true);
      ini_set('display_errors', 'On');
      error_reporting(E_ALL | E_STRICT);
    }
    return self::$firephp;
  }
}