<?php

namespace App\Repositories;

use App\Models\Penerbit;
use App\Interfaces\PenerbitRepositoryInterface;

class PenerbitRepository implements PenerbitRepositoryInterface
{
    public function all()
    {
        return Penerbit::all();
    }

    public function find($id)
    {
        return Penerbit::find($id);
    }

    public function create(array $data)
    {
        return Penerbit::create($data);
    }

    public function update($id, array $data)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($data);
        return $penerbit;
    }

    public function delete($id)
    {
        return Penerbit::findOrFail($id)->delete();
    }
}
