<?php

namespace GhaniniaIR\Cron\Validations\Single;

use GhaniniaIR\Cron\Validations\Interfaces\ValidationContract;

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
