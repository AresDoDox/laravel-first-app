<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

#[Signature('app:todo-command')]
#[Description('Command description')]
class TodoCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Log::info('This is a scheduled task running every minute.');
    }
}
