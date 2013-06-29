<?php

$loggedin = false;

$user = $facebook->getUser();
if ($user) {  
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');

    // get user token
    if(!$opengraph->hasUserToken($user)){
    $access_token = $facebook->getAccessToken();
      if($access_token){
        $db->insert('facebook_session',array('facebook_id'=>$user,'facebook_token'=>$access_token,'updatedAt'=>date('Y-m-d H:i:s')));
      }else{
        $facebook->setExtendedAccessToken();
        $access_token = $facebook->getAccessToken();
        $db->insert('facebook_session',array('facebook_id'=>$user,'facebook_token'=>$access_token,'updatedAt'=>date('Y-m-d H:i:s')));
      }
    }

    // save facebook data
    if($opengraph->isNewUser($user)){#save data
      $profile = $opengraph->setProfile($user_profile);
    }else{#get data
      $profile = $opengraph->getProfile($user);
    }

    $_SESSION['id'] = $profile['user_id'];

    $loggedin = true;

    $tpl->assign('profile',$profile);

  } catch (FacebookApiException $e) {
    //echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
    $user = null;
    $loggedin = false;
  }
}