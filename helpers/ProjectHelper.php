<?php

namespace app\helpers;

use Yii;

class ProjectHelper
{
    public const PARAM_WEB_THUMBNAIL_ROOT_KEY = 'web_thumbnail_root';
    public const PARAM_BASE_DOMAIN = 'base_domain';

    public static function getThumbnailImageRoot(): string
    {
        $thumbnailParts = [
            Yii::$app->params[static::PARAM_BASE_DOMAIN],
            Yii::getAlias('@web'),
            Yii::$app->params[static::PARAM_WEB_THUMBNAIL_ROOT_KEY],
        ];

        return implode('', $thumbnailParts);
    }
}