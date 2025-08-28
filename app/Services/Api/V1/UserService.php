<?php

namespace App\Services\Api\V1;

class UserService extends BaseService
{
    public function all()
    {
        return $this->client()->get('/api/v1/users');
    }

    public function store(array $data)
    {
        return $this->client()->post('/api/v1/users', $data);
    }

    public function show($id)
    {
        return $this->client()->get("/api/v1/users/{$id}");
    }

    public function update($id, array $data)
    {
        return $this->client()->put("/api/v1/users/{$id}", $data);
    }

    public function destroy($id)
    {
        return $this->client()->delete("/api/v1/users/{$id}");
    }
}
