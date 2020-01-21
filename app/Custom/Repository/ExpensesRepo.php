<?php

namespace App\Custom\Repository;

use App\MyDaybook\Daybook;

class ExpensesRepo
{
    public function get_expenses($values)
    {
        $daybooks = $this->fetch_daybook_record($values['date']);
        $expense = 0;

        foreach ($daybooks as $daybook)
        {
            $expense += $daybook->price;
        }

        return $expense;
    }

    private function fetch_daybook_record($date)
    {
        return Daybook::where([
            ['created_at', 'like', '%' . $date . '%'],
            ['status', '=', 0]
        ])->get();
    }
}
