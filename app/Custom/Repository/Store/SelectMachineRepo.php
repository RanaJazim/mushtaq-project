<?php

namespace App\Custom\Repository\Store;

use App\Custom\Validation\IValidation;
use App\Store\Inward;
use App\Store\Machine;
use App\Store\Rawmaterial;
use Illuminate\Support\Facades\DB;

class SelectMachineRepo
{
    public function get_record($inward_id)
    {
        $inward = Inward::findOrfail($inward_id);
        $machines = $this->get_appropriate_machines($inward);

        return [
            'inward'     => $inward,
            'machines'   => $machines
        ];
    }

    public function index($inward_id)
    {
        return Rawmaterial::with(['machine', 'plantsheet'])
            ->where('inward_id', '=', $inward_id)
            ->get();
    }

    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);

        $inward = Inward::findOrFail($values['inward_id']);
        $inward->productQty = $values['qty'] - $values['issue'];
        $inward->save();

        return Rawmaterial::create($attributes);
    }

    private function get_appropriate_machines($inward)
    {
        $_machines = [];
        foreach ($inward->rawmaterials as $raw)
        {
            array_push($_machines, $raw->machine);
        }

        return DB::table('machines')
            ->where(function ($query) use ($_machines) {
                foreach ($_machines as $machine)
                {
                    $query->where('id', '!=', $machine->id);
                }
            })
            ->get();
    }
}
