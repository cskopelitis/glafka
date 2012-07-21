<?php
use security\AuthenticationModule;
require_once 'security/AuthenticationModule.php';

$providedUsername=$_GET['username'];
$providedPassword=$_GET['password'];

if($providedUsername!=null && $providedPassword!=null){
 $authMod=new AuthenticationModule();

 $targetPage='login.php?loginFailed';
 if($authMod->authorize($providedUsername, $providedPassword)>0){
  $targetPage='dashboard.php';
 }

 header('Location: ' . $targetPage);

 exit;
}