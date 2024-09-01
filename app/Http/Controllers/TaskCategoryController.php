<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskCategoryRequest;
use App\Http\Requests\UpdateTaskCategoryRequest;
use App\Models\TaskCategory;
use App\Services\TaskCategoryService;

class TaskCategoryController extends Controller
{
    public function __construct(private readonly TaskCategoryService $service) {}

    public function index()
    {
        return response()->json($this->service->index());
    }

    public function store(StoreTaskCategoryRequest $request)
    {
        return response()->json([
            'message' => __('Task category created successfully'),
            'data' => $this->service->store($request->validated()),
        ]);
    }

    public function show(TaskCategory $taskCategory)
    {
        return response()->json($this->service->show($taskCategory));
    }

    public function update(UpdateTaskCategoryRequest $request, TaskCategory $taskCategory)
    {
        return response()->json([
            'message' => __('Task category updated successfully'),
            'data' => $this->service->update($request->validated(), $taskCategory),
        ]);
    }

    public function destroy(TaskCategory $taskCategory)
    {
        return response()->json([
            'message' => __('Task category deleted successfully'),
            'success' => $this->service->destroy($taskCategory),
        ]);
    }
}
