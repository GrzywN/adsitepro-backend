<?php

namespace App\Services;

use App\Http\Resources\TaskCategoryCollection;
use App\Http\Resources\TaskCategoryResource;
use App\Models\TaskCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskCategoryService
{
    public function index(): TaskCategoryCollection
    {
        return new TaskCategoryCollection(TaskCategory::all());
    }

    public function store(array $data): JsonResource
    {
        $newTaskCategory = TaskCategory::factory()->create($data);

        return TaskCategoryResource::make($newTaskCategory);
    }

    public function show(array $taskCategory): JsonResource
    {
        return TaskCategoryResource::make($taskCategory);
    }

    public function update(array $data, TaskCategory $currentTaskCategory): JsonResource
    {
        $updatedTask = $currentTaskCategory->update($data);

        return TaskCategoryResource::make($updatedTask);
    }

    public function destroy(TaskCategory $taskCategory): bool
    {
        return $taskCategory->delete();
    }
}
