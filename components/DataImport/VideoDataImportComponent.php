<?php

namespace app\components\DataImport;

use app\models\Video;
use yii\base\Component;

class VideoDataImportComponent extends Component
{
    protected const MAX_LIMIT_IMPORT_VIDEO = 1000;

    public function import(): void
    {
        for ($i = 0; $i < static::MAX_LIMIT_IMPORT_VIDEO; $i++) {
            $video = new Video([
                'title' => $this->createVideoTitle(),
                'thumbnail' => 'thmb.png',
                'duration' => rand(10, 9999),
                'views' => rand(10, 9999),
            ]);
            $video->save();
        }
    }

    protected function createVideoTitle(): string
    {
        return md5('title: ' . md5(rand(1, 999999) . microtime(true)));
    }
}
