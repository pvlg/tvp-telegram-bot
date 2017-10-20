<?php

namespace backend\controllers;

use yii\web\Controller;

class BotController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionBot()
    {
        $this->layout = false;

        return $this->render('bot');
    }
}
