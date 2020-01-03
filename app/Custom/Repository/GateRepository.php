<?php

namespace App\Custom\Repository;

use App\Custom\Validation\IValidation;
use App\Gate;

class GateRepository
{
    public function all()
    {
        return Gate::all();
    }

    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);

        return Gate::create($attributes);
    }

    public function single($id)
    {
        return Gate::findOrFail($id);
    }

    public function update($values, IValidation $validation, $id)
    {
        $attributes = $validation->validate_data($values);

        return Gate::findOrFail($id)->update($attributes);
    }

    public function destroy($id)
    {
        return Gate::findOrFail($id)->delete();
    }

}







