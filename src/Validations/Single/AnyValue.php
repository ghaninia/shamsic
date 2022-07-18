<?php

namespace GhaniniaIR\Schedule\Validations\Single;

use GhaniniaIR\Schedule\Validations\Single\Interfaces\ValidationContract;

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
