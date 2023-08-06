<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weekly Task Planner</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="antialiased">
<div class="container mt-5">
    <h1 class="text-center mb-4">Weekly Task Planner</h1>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Developer Name</th>
            <th>Task Name</th>
            <th>Duration (hours)</th>
            <th>Difficulty</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($developerWorkloads as $developerName => $tasks)
            @forelse($tasks as $task)
                <tr>
                    @if ($loop->first)
                        <td rowspan="{{ count($tasks) }}">{{ $developerName }}</td>
                    @endif
                    <td>{{ $task['name'] }}</td>
                    <td>{{ $task['duration'] }}</td>
                    <td>{{ $task['difficulty'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No tasks available! You can type "php artisan fetch:tasks" into the console to create tasks.</td>
                </tr>
                @break
            @endforelse
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
