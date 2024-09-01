<?php

namespace App\Services;

use App\Http\Resources\UserCollection;
use App\Models\User;

class UserService
{
    public function index(): UserCollection
    {
        return new UserCollection(User::all());
    }
}
