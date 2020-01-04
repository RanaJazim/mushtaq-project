<?php

namespace App\Custom\Repository\Invoice;

class WithoutTaxPayer implements InvoiceDecorator
{
    public function filter_fields($request, $validate_data)
    {
        $validate_data['value']         = $request['value'];
        $validate_data['totalValue']    = $request['totalValue'];

        return $validate_data;
    }
}

