<?php
require_once 'model/Subject.php';
require_once 'model/Course.php';
require_once 'notification/model/Channel.php';

Subject::initDb();
Course::initDb();
Channel::initDb();
?>