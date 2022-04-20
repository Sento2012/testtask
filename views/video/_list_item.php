<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
    Title: <?= $model->title; ?><br>
    Thumb: <?= Html::img($model->getWebThumbnailPath(), ['width' => 100, 'height' => 100]); ?><br>
    Views: <?= $model->views; ?><br>
    Duration: <?= $model->duration; ?><br>
    Added: <?= $model->added; ?>
