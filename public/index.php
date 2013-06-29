<?php
session_start();
require_once dirname(__FILE__).'/../libs/inc.php';

//runkeeperAPI
$rk_connect_url = $runkeeperAPI->connectRunkeeperButtonUrl();
$tpl->assign('rk_connect_url',$rk_connect_url);
if(isset($_GET['callback']) && $_GET['callback'] === 'rk' && isset($_GET['code'])){
  $auth_code = $_GET['code'];
  if($runkeeperAPI->getRunkeeperToken($auth_code) == false) {
    echo $runkeeperAPI->api_last_error; /* get access token problem */
    exit();
  }else {
    $db->insert('runkeeper_session',array('user_id'=>$_SESSION['id'],'runkeeper_token'=>$runkeeper->access_token,'updatedAt'=>date('Y-m-d H:i:s')));

    echo '<script>window.close()</script>';
    exit;
  }
}


$tpl->assign('title','hApi, your health API');
$tpl->assign('loggedin',$loggedin);

$html = $tpl->draw( 'main', $return_string = true );
echo $html;

