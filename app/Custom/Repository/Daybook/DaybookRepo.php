<?php

namespace App\Custom\Repository\Daybook;

use App\Custom\Validation\IValidation;
use App\MyDaybook\Balance;
use App\MyDaybook\Daybook;

class DaybookRepo
{
    public function get_values($date)
    {
        $openingBalance = 0;
        $remainingBalance = 0;

        $balance = Balance::where('openingBalanceDate', '=', $date)->first();
        $daybooks = Daybook::where([
            ['created_at', 'like', '%' . $date . '%'],
            ['status', '=', 0]
        ])->get();


        foreach ($daybooks as $daybook)
        {
            $remainingBalance += $daybook->price;
        }

        if ($balance)
            $openingBalance = $balance->todayBalance;

        return [
            'openingBalance' => $openingBalance,
            'remainingBalance' => $openingBalance - $remainingBalance,
            'daybooks' => $daybooks
        ];
    }

    public function store($values, IValidation $validation, $status)
    {
        $attributes = $validation->validate_data($values);
        $daybook = new Daybook();
        $daybook->description = $attributes['description'];
        $daybook->price = $attributes['price'];
        $daybook->status = $status;
        $daybook->save();

        if ($status)
        {
            $balance = new BalanceRepo();
            $balance->store($values['price'], date('Y-m-d'));
        }
    }

    public function get_daybook($date)
    {
        return Daybook::where(
            'created_at', 'like', '%' . $date . '%'
        )->get();
    }

    public function update($values, $id, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $daybook = Daybook::findOrFail($id);

        $daybook->description = $attributes['description'];
        $daybook->price = $attributes['price'];
        $daybook->save();

        return $daybook;
    }
}
