<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Http;

class ToDoService
{
    public function fetchAndStoreTasks()
    {
        $api1Data = Http::get('http://www.mocky.io/v2/5d47f24c330000623fa3ebfa')->json();
        $api2Data = Http::get('http://www.mocky.io/v2/5d47f235330000623fa3ebf7')->json();

        foreach ($api1Data as $taskData) {
            Task::query()->updateOrCreate(
                [
                    'name' => $taskData['id']
                ],
                [
                    'duration' => $taskData['sure'],
                    'difficulty' => $taskData['zorluk'],
                ]
            );
        }

        foreach ($api2Data as $taskData) {
            $key = key($taskData);
            Task::query()->updateOrCreate(
                [
                    'name' => $key,
                ],
                [
                    'name' => $key,
                    'duration' => $taskData[$key]['estimated_duration'],
                    'difficulty' => $taskData[$key]['level'],
            ]);
        }
    }
}
