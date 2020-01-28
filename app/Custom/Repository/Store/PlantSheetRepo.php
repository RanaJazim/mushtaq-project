<?php

namespace App\Custom\Repository\Store;

use App\Custom\Validation\IValidation;
use App\Store\Inward;
use App\Store\Plantinfo;
use App\Store\Plantsheet;
use App\Store\Rawmaterial;

class PlantSheetRepo
{
    public function fetch_inward($inward_id)
    {
//        $inward = Inward::with('plantinfo')
//            ->findOrFail($inward_id);
        $inward = Inward::findOrfail($inward_id);
        $flag = false;

        $plantinfo = Plantinfo::where('inward_id', '=', $inward_id)->first();

        if ($plantinfo)
            $flag = true;

        return [
            'inward'        => $inward,
            'is_available'  => $flag,
            'plantinfo'     => $plantinfo
        ];
    }

    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $this->create_plantInfo($values);
        $this->update_inward_entry($values);

        $plant_sheet = new Plantsheet();
        $plant_sheet->rawmaterial_id = $values['rawmaterial_id'];
        $plant_sheet->useWeight = $values['useWeight'];
        return $plant_sheet->save();
    }

    private function update_inward_entry($values)
    {
        $inward = Inward::findOrFail($values['inward_id']);
        $inward->productQty = $inward->productQty - $values['useWeight'];
        return $inward->save();
    }

    private function create_plantInfo($values)
    {
        $plant_info = new Plantinfo();

        $plant_info->inward_id = $values['inward_id'];
        $plant_info->partyName = $values['partyName'];
        $plant_info->nali = $values['nali'];
        $plant_info->sheetPly = $values['sheetPly'];
        $plant_info->size = $values['size'];
        $plant_info->sheet = $values['sheet'];
        $plant_info->cutSheet = $values['cutSheet'];

        return $plant_info->save();
    }

}
