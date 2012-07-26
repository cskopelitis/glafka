/* Used in conjuction with /client/notificaton.js in order to make * async calls to the Redis datastore in order to
retrieve any new notifications */
<?php
use security\User;
require_once 'security/model/User.php';

$username = $_GET['username'];
if(!$username){
  // TODO return 'Not Authorized';
}

$user=new User($id);
// TODO the page is still open and interacting. update the session.

$notifications=$user->notifications;
foreach ($notifications as $notification) {
  // foreach notification
  // attr: channelId
  // attr: number_of_new_items
  // echo in JSON
  // done
}