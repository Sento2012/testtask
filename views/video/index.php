<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'row',
            'id' => 'list-wrapper',
        ],
        'itemOptions' => ['class' => 'col-lg-3 border'],
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item', ['model' => $model]);
        },
        'layout' => "{items}\n{summary}\n{pager}",
        'pager' => [
            'firstPageLabel' => ' << ',
            'lastPageLabel' => ' >> ',
            'prevPageLabel' => ' <i class="bi bi-arrow-left-short"></i> ',
            'nextPageLabel' => ' <i class="bi bi-arrow-right-short"></i> ',
        ],
    ]) ?>


</div>
