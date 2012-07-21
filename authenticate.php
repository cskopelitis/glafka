<?php
require_once 'core/Plexus.php';
require_once 'exception/AuthenticationException.php';

$username=$_GET['username'];
$password=$_GET['password'];

$targetPage='login.php?loginFailed';
if($username && $password) {
  try{
    \plexus\Plexus::instruct()->requestJoin($username,$password);
    $targetPage='dashboard.php';
  }catch (\exception\AuthenticationException $ae){
    $targetPage . '&reason=' . $ae->getExitCode();
  }
}

header('Location: ' . $targetPage);

exit;