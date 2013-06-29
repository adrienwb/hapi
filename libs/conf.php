<?php

#DB
define('HOST','127.0.0.1');
define('USERNAME','api_user');
define('PASSWORD','api_user');
define('DATABASE','api');

#Facebook
$_CONF['FACEBOOK']['APP_ID'] = '543844162348167';
$_CONF['FACEBOOK']['APP_SECRET'] = '252b22cae54724fb99622ee940ca0ee8';

#Runkeeper
$_CONF['RUNKEEPER']['CLIENT_ID'] = '5dfcb2c100c34fcfb2bc5117ef1454fc';
$_CONF['RUNKEEPER']['CLIENT_SECRET'] = '536cef9d15a8464985a65c7dd421ad29';
$_CONF['RUNKEEPER']['AUTHORIZATION_URL'] = 'https://runkeeper.com/apps/authorize';
$_CONF['RUNKEEPER']['ACCESS_TOKEN_URL'] = 'https://runkeeper.com/apps/token';
$_CONF['RUNKEEPER']['DEAUTHORIZATION_URL'] = 'https://runkeeper.com/apps/de-authorize';

#Domain
$_CONF['BASE_URL'] = 'http://api.wiesebron.co';

#PATH
define('LIBS_CLASSES_PATH', __DIR__ . '/classes');
define('LIBS_CORE_PATH', __DIR__ . '/core');
define('LIBS_VENDORS_PATH', __DIR__ .'/vendors');

define('LIBS_PATH',__DIR__ .'/../libs');
define('MODULES_PATH',__DIR__ .'/../public/modules');
define('TPL_PATH',__DIR__ .'/../public/tpl/');
define('TPL_CACHE_PATH',__DIR__ .'/../public/cache/tpl/');
