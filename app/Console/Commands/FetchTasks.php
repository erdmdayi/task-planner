<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Facades\ToDoFacade;

class FetchTasks extends Command
{
    protected $signature = 'fetch:tasks';

    protected $description = 'Fetch tasks from APIs and store them in the database';

    public function handle()
    {
        ToDoFacade::fetchAndStoreTasks();
        $this->info('Tasks fetched and stored successfully.');
    }
}
