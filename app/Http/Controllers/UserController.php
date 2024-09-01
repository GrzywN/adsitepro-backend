<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private readonly UserService $service) {}

    public function index()
    {
        return response()->json($this->service->index());
    }

    public function store(Request $request)
    {
        throw new \Exception('Not implemented');
    }

    public function show(string $id)
    {
        throw new \Exception('Not implemented');
    }

    public function update(Request $request, string $id)
    {
        throw new \Exception('Not implemented');
    }

    public function destroy(string $id)
    {
        throw new \Exception('Not implemented');
    }
}
