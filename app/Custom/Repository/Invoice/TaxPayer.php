<?php

namespace App\Custom\Repository\Invoice;

class TaxPayer implements InvoiceDecorator
{
    private $invoiceDecorator;

    public function __construct(InvoiceDecorator $decorator)
    {
        $this->invoiceDecorator = $decorator;
    }

    public function filter_fields($request, $validate_data)
    {
        $validate_data = $this->invoiceDecorator->filter_fields($request, $validate_data);

        $validate_data['stTaxValue'] = $request['stTaxValue'];
        $validate_data['whtTax'] = $request['whtTax'];
        $validate_data['whtValue'] = $request['whtValue'];
        $validate_data['totalValue'] = $request['totalValue'];

        return $validate_data;
    }
}

