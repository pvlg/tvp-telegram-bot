<?php

namespace console\controllers;

use yii\console\Controller;
use Yii;
use yii\helpers\Console;

class BotController extends Controller
{
    public function actionRun()
    {
        $hour = (int)date('G');
        if ($hour >= 23 || $hour <= 9) {
            Console::output("$hour hour sleeping...");
            sleep(60);
        }

        require Yii::getAlias('@root/backend/views/bot/bot.php');

        sleep(1800);
    }
}
