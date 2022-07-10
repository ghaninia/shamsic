<?php

namespace GhaniniaIR\SolarCron\Validations\Single;

use GhaniniaIR\SolarCron\Validations\Interfaces\ValidationContract;

class AnyValue implements ValidationContract
{
    public function passes($value): bool
    {
        return $value === "*";
    }

    public function message(): string
    {
        return "default value must be '*'";
    }
}
