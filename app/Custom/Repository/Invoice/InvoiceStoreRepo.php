<?php

namespace App\Custom\Repository\Invoice;

use App\Custom\Validation\IValidation;
use App\MyInvoice\Invoice;

class InvoiceStoreRepo
{
    public function store($values, IValidation $validation)
    {
        $decorator = new WithoutTaxPayer();

        if ($values['isTaxPayer'] == 1)
            $decorator = new TaxPayer($decorator);

        $data = $decorator->filter_fields($values, $validation->validate_data($values));
        return Invoice::create($data);
    }
}
