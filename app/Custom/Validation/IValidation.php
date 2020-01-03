<?php

namespace App\Custom\Validation;

interface IValidation
{
    /*
     * @return validate data and take input data from some input like html forms
     */
    public function validate_data($values);
}



