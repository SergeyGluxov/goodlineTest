<?php

namespace App\Helpers;

use Carbon\Carbon;

class HelpersPaste
{

//Функция выбора времени доступности пасты
    public static function addHours($option)
    {
        $addTime = Carbon::now();
        switch ($option) {
            case ("0"):
                $addTime->addMinutes(10);
                break;
            case ("1"):
                $addTime->addHour();
                break;
            case ("2"):
                $addTime->addHours(3);
                break;
            case ("3"):
                $addTime->addDay();
                break;
            case ("4"):
                $addTime->addDays(7);
                break;
            case ("5"):
                $addTime->addMonth();
                break;
            case ("6"):
                $addTime->addCentury();
                break;
        }
        return $addTime->format('Y-m-d H:i:s');
    }
}