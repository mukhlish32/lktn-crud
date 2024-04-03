<?php

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;

class UserRepository implements UserRepositoryInterface
{
    
    public function all()
    {
        return User::all();
    }

    public function create(array $data)
    {
        $data['created_at'] = Carbon::now();

        return User::create($data);
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);
        $data['updated_at'] = Carbon::now();

        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}
