<?php

#CONFIGURATION FILE
require_once dirname(__FILE__).'/conf.php';

#AUTOLOAD
require_once LIBS_PATH.'/autoloader.php';

#DATABASE
$db = new db(sprintf('mysql:host=%s;dbname=%s',HOST,DATABASE),USERNAME,PASSWORD);

#VENDORS
//include and init the RainTPL class
require_once LIBS_VENDORS_PATH.'/raintpl/inc/rain.tpl.class.php';
raintpl::configure("base_url", null );
raintpl::configure("tpl_dir", TPL_PATH );
raintpl::configure("cache_dir", TPL_CACHE_PATH );
raintpl::configure('tpl_ext', 'tpl' );
raintpl::configure('path_replace', false );
$tpl = new RainTPL;
$tpl->assign('conf', $_CONF );

//Facebook
require_once LIBS_VENDORS_PATH.'/facebook/facebook.php';
$facebook = new Facebook(array(
  'appId'  => $_CONF['FACEBOOK']['APP_ID'],
  'secret' => $_CONF['FACEBOOK']['APP_SECRET'],
));

//Runkeeper
require_once LIBS_VENDORS_PATH.'/runkeeper/runkeeperAPI.class.php';
$rk_api_conf = $_CONF['RUNKEEPER'];
$rk_api_conf['REDIRECT_URI'] = $_CONF['BASE_URL'].'?callback=rk';
$rk_api_conf['API_BASE_URL'] = $_CONF['BASE_URL'];
$runkeeperAPI = new runkeeperAPI($rk_api_conf);

#third-party apps
$opengraph = new Opengraph($db);
$runkeeper = new Runkeeper($db);


require_once MODULES_PATH.'/session.php';