<?php
/**
 * Created by PhpStorm.
 * User: HungPC
 * Date: 8/21/2018
 * Time: 10:51 AM
 */

class ExceptionHandler
{
    public function __construct()
    {
        define('YII_ENABLE_EXCEPTION_HANDLER',false);
        set_exception_handler(array($this,'handleException'));
    }

    public function handleException($exception)
    {
        // disable error capturing to avoid recursive errors
        restore_error_handler();
        restore_exception_handler();

        if($exception instanceof Exception && $exception->statusCode == 404)
        {
            try
            {
                Yii::$app->runAction("wp/index");
            }
            catch(Exception $e) {
                echo "<pre>";
                print_r ($e);
                echo "</pre>";
                exit;
            }
        }

    }
}