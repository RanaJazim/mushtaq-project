<?php

namespace App\Custom\Repository\Daybook;

use App\MyDaybook\Balance;

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

    public function endDay($balance, $date)
    {

    }
}
