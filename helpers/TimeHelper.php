<?php

namespace app\helpers;

class TimeHelper
{
    public const HOUR_SECONDS = 3600;
    public const MINUTE_SECONDS = 60;

    public static function getFormattedTime(int $time): string
    {
        if ($time < static::HOUR_SECONDS) {
            $minutes = intdiv($time, static::MINUTE_SECONDS);
            $seconds = str_pad($time % static::MINUTE_SECONDS, 2, '0', STR_PAD_LEFT);

            return $minutes . ':' . $seconds;
        }

        $countHours = intdiv($time, static::HOUR_SECONDS);
        $countMinutes = str_pad(
            intdiv($time - $countHours * static::HOUR_SECONDS, static::MINUTE_SECONDS),
            2,
            '0',
            STR_PAD_LEFT
        );
        $countSeconds = str_pad($time % static::MINUTE_SECONDS, 2, '0', STR_PAD_LEFT);

        return $countHours . ':' . $countMinutes . ':' . $countSeconds;
    }
}