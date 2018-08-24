<?php
/**
 * Created by PhpStorm.
 * User: HungPC
 * Date: 8/21/2018
 * Time: 10:52 AM
 */

namespace app\controllers;
use yii\web\Controller;
use yii\base\Exception;

class WpController extends Controller
{
    public function actionIndex()
    {
        $this->layout = false; // note that we disable the layout
        try {
            $this->render('index');
//            Yii::$app->end();
        }
        catch (Exception $e) {
            throw $e;
        }
    }
}