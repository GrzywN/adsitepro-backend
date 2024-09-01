<?php

namespace App\Services;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskService
{
    public function index(): TaskCollection
    {
        return new TaskCollection(Task::orderBy('completed_at', 'asc')->get());
    }

    public function store(array $data): JsonResource
    {
        $newTask = Task::factory()->create($data);

        return TaskResource::make($newTask);
    }

    public function show(array $task): JsonResource
    {
        return TaskResource::make($task);
    }

    public function update(array $data, Task $currentTask): JsonResource
    {
        $updatedTask = $currentTask->update($data);

        return TaskResource::make($updatedTask);
    }

    public function complete(Task $currentTask): JsonResource
    {
        $updatedTask = $currentTask->markAsCompleted();

        return TaskResource::make($updatedTask);
    }

    public function destroy(Task $task): bool
    {
        return $task->delete();
    }
}
