<?php

namespace App\Custom\Repository\Daybook;

use App\MyDaybook\Balance;
use App\MyDaybook\Daybook;

class BalanceRepo
{
    public function store($balance, $date)
    {
        $balanceQuery = null;
        $balanceQuery = Balance::where('openingBalanceDate', '=', $date)->first();

        if ($balanceQuery)
        {
            $balance += $balance;
        }
        else
        {
            $balanceQuery = new Balance();
        }

        $balanceQuery->todayBalance = $balance;
        $balanceQuery->openingBalanceDate = $date;
        $balanceQuery->save();
    }

    public function endDay()
    {
        $dayboook = Daybook::all()->last();
        $date = ($dayboook->created_at)->toDateString();

        if (!Balance::where('openingBalanceDate', '=', $date)->exists())
        {
            $repo = new DaybookRepo();
            $values = $repo->get_values($date);

            $balance = new Balance();
            $balance->openingBalanceDate = $date;
            $balance->todayBalance = $values['remainingBalance'];
            $balance->save();
        }
    }
}
