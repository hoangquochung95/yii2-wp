<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

define('WP_USE_THEMES', true);
$wp_did_header = true;

require_once('wp-load.php');

require_once( __DIR__ . '/../components/ExceptionHandler.php');
$router = new ExceptionHandler();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

try {
    (new yii\web\Application($config))->run();
} catch (Exception $exception) {
    if($exception instanceof Exception && $exception->statusCode == 404)
        $router->handleException($exception);
    else
        throw $exception;
}