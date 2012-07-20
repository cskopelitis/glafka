<?php
/********* Debug ***********/
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
require_once('FirePHPCore/FirePHP.class.php');
/***************************/

require 'model/Subject.php';
require 'model/Course.php';
require 'notification/model/Channel.php';
require 'security/model/User.php';
require_once 'conf/app.conf.php';

business\Subject::initDb();
business\Course::initDb();

notification\Channel::initDb();

security\User::initDb();
?>