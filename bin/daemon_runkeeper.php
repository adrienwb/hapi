<?php
session_start();
require_once dirname(__FILE__).'/../libs/inc.php';

$users = $opengraph->getConnectedUsers();
foreach($users as $user){
  $facebook->setAccessToken($user['facebook_token']);
  if($facebook->getUser() === $user['facebook_id']){
    var_dump($facebook->api('/me/?fields=checkins'));
  }
}




