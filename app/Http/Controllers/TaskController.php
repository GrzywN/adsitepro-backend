<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function __construct(private readonly TaskService $service) {}

    public function index()
    {
        return response()->json($this->service->index());
    }

    public function store(StoreTaskRequest $request)
    {
        return response()->json([
            'message' => __('Task created successfully'),
            'data' => $this->service->store($request->validated()),
        ]);
    }

    public function show(Task $task)
    {
        return response()->json($this->service->show($task));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        return response()->json([
            'message' => __('Task updated successfully'),
            'data' => $this->service->update($request->validated(), $task),
        ]);
    }

    public function complete(Task $task)
    {
        return response()->json([
            'message' => __('Task completed successfully'),
            'data' => $this->service->complete($task),
        ]);
    }

    public function destroy(Task $task)
    {
        return response()->json([
            'message' => __('Task deleted successfully'),
            'success' => $this->service->destroy($task),
        ]);
    }
}
