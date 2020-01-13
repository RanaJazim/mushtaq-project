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
        $balanceOnDate = Balance::where('openingBalanceDate', '=', date('Y-m-d'))->first();

        if (!$balanceOnDate)
        {
            $lastDaybook = Daybook::all()->last();

            if ($lastDaybook)
            {
                $date = ($lastDaybook->created_at)->toDateString();
                $daybookRepo = new DaybookRepo();

                $values = $daybookRepo->get_values($date);

                $balanceObj = new Balance();
                $balanceObj->todayBalance = $values['openingBalance'] - $values['remainingBalance'];
                $balanceObj->openingBalanceDate = date('Y-m-d');
                $balanceObj->save();
            }
        }
    }
}
