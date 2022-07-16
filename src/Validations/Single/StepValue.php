<?php

namespace GhaniniaIR\SolarCron\Validations\Single;

use GhaniniaIR\SolarCron\Validations\Single\Interfaces\ValidationContract;

class StepValue implements ValidationContract
{

    public function passes($value): bool
    {
        $values = explode("/", $value);

        if (count($values) !== 2) {
            return false;
        }

        $firstValue = $values[0];
        $secondValue = $values[1];

        if ($secondValue <= 0) {
            return false;
        }

        if ($firstValue != "*") {
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return "The value must be in the format of '* / N'";
    }
}
