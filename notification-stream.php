<?php
/* Used in conjuction with /client/notificaton.js in order to make
 * async calls to the Redis datastore in order to retrieve any new notifications
*/
use security\User;
require_once 'security/model/User.php';
use logger\Logger;
require_once 'util/Logger.php';

$username = $_GET['username'];
Logger::var_dump('username', $username);

if(!$username){
    // 204: no-content
}

$user=new User($username);
$notificationsJsonArray=$user->notifications;

if(!$notificationsJsonArray){
    echo '[]';
} else {
    echo $notificationsJsonArray;
}