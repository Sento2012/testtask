<?php

namespace app\models;

use app\helpers\ProjectHelper;
use app\helpers\TimeHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "videos".
 *
 * @property int $id
 * @property string $title
 * @property string $thumbnail
 * @property int $duration
 * @property int $views
 * @property string $added
 */
class Video extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'videos';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'added',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'thumbnail', 'duration'], 'required'],
            [['duration', 'views'], 'default', 'value' => null],
            [['duration', 'views'], 'integer'],
            [['added'], 'safe'],
            [['title', 'thumbnail'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'thumbnail' => 'Thumbnail',
            'duration' => 'Duration',
            'views' => 'Views',
            'added' => 'Added',
        ];
    }

    public function getWebThumbnailPath(): string
    {
        return ProjectHelper::getThumbnailImageRoot() . $this->thumbnail;
    }

    public function getFormattedDuration(): string
    {
        return TimeHelper::getFormattedTime($this->duration);
    }
}
