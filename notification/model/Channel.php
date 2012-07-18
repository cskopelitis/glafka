<?php
require_once '../redis/RedisHashSet.php';

class Channel extends RedisHashSet {

  //   private $name;

  public function __construct($id){
    parent::__construct('ch' . $id);
  }

  public static function initDb(){
    $channel=new Channel(1);
    $channel->name='Forum Channel';
    $channel=new Channel(2);
    $channel->name='Library Channel';
  }
}
?>