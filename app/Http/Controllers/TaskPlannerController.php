<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Task;

class TaskPlannerController extends Controller
{
    public function index()
    {
        $developers = Developer::all()->toArray();

        // Working times and difficulties of developers
        $developerData = [];
        foreach ($developers as $developer) {
            $developerData[$developer['name']] = [
                'hours' => $developer['hours'],
                'difficulty' => $developer['difficulty'],
            ];
        }

        // get all tasks
        $tasks = Task::query()->orderByDesc('difficulty')->get()->toArray();

        // the weekly working hours of developers
        $weeklyHours = 45; // Total working hours per week
        $totalDifficulty = array_sum(array_column($developerData, 'difficulty'));
        foreach ($developerData as &$data) {
            $workloadPercentage = $data['difficulty'] / $totalDifficulty;
            $data['weeklyWorkHours'] = round($weeklyHours * $workloadPercentage);
        }

        $developerWorkloads = [];
        // assignment of tasks
        foreach ($developerData as $developerName => &$data) {
            $developerWorkloads[$developerName] = [];
            $workHours = $data['weeklyWorkHours'];

            foreach ($tasks as $index => $task) {
                if ($workHours >= $task['duration']) {
                    $developerWorkloads[$developerName][] = $task;
                    $workHours -= $task['duration'];
                    unset($tasks[$index]);
                }
            }
        }

        return view('index', compact('developerWorkloads', 'developerData'));
    }
}
