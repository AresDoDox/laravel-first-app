<?php

namespace App\Jobs;

use App\Models\Todo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessTodoJob implements ShouldQueue
{
    use Queueable;
    public $todo;

    /**
     * Create a new job instance.
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // trước khi queue xử lý
        Log::info('Processing todo: ' . $this->todo->id);

        sleep(15); // giả lập thời gian xử lý
        Log::info('Finished processing todo: ' . $this->todo->id);
    }
}
