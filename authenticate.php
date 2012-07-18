<?php
require_once 'security/AuthenticationModule.php';

$providedUsername=$_GET['username'];
$providedPassword=$_GET['password'];

if($providedUsername!=null && $providedPassword!=null){
  $authMod=new AuthorizationModule();

  $targetPage='login.php?loginFailed';
  if($authMod->authorize($providedUsername, $providedPassword)>0){
    $targetPage='dashboard.php';
  }

  header('Location: ' . $targetPage);

  exit;
}

?>