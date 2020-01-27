<?php

namespace App\Custom\Repository\Store;

use App\Custom\Validation\IValidation;
use App\Store\Inward;
use App\Store\Printreport;

class PrintReportRepo
{
    public function create($inward_id)
    {
        $inward = Inward::findOrFail($inward_id);

        return [
            'inward' => $inward
        ];
    }

    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $first_total = 0;
        $second_total = 0;

        $first_total += $this->get_result($attributes['gas'], $attributes['perGas']);
        $first_total += $this->get_result($attributes['starchUse'], $attributes['perStarchUse']);
        $first_total += $this->get_result($attributes['causticSoda'], $attributes['perCausticSoda']);
        $first_total += $this->get_result($attributes['borex'], $attributes['perBorex']);
        $first_total += $this->get_result($attributes['wood'], $attributes['perWood']);
        $first_total += $attributes['electricity'];
        $first_total += $attributes['labSheet'];
        $first_total += $attributes['office'];
        $attributes['firstTotal'] = $first_total;

        $second_total += $attributes['labCtn'];
        $second_total += $attributes['priCh'];
        $second_total += $attributes['pinCh'];
        $attributes['secondTotal'] = $second_total + $first_total;

        return Printreport::create($attributes);
    }

    private function get_result($item, $perItem)
    {
        return $item * $perItem;
    }
}
