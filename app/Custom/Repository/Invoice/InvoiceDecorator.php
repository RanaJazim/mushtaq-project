<?php

namespace App\Custom\Repository\Invoice;

interface InvoiceDecorator
{
    /*
     * @params it will accept the HTML INPUT then we filter data and
     * the second param is validate_data which contains the data that
     * is already validated
     * @return after filtering the data we return back
     */
    public function filter_fields($request, $validate_data);
}
