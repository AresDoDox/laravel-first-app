<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule & Cronjob
// Schedule::call(function () {
//     // Code to be executed every minute
//     Log::info('This is a scheduled task running every minute.');
// })->everyMinute();

// With schedule command
Schedule::command('app:todo-command')->everyMinute();
