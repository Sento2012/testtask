<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class DataController extends Controller
{
    public function actionImport(): int
    {
        Yii::$app->videoDataImportComponent->import();

        return ExitCode::OK;
    }
}
