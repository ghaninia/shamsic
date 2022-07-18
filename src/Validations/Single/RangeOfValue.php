<?php

namespace GhaniniaIR\Schedule\Validations\Single;

use GhaniniaIR\Schedule\Validations\Single\Interfaces\ValidationContract;

class RangeOfValue implements ValidationContract
{

    public function __construct(
        protected int $min = 0,
        protected int $max = 59,
    ) {
    }

    public function passes($value): bool
    {
        $values = explode("-", $value);

        if (count($values) !== 2) {
            return false;
        }

        $firstValue = (int) $values[0];
        $secondValue = (int) $values[1];

        if ($firstValue < $this->min || $firstValue > $this->max) {
            return false;
        }

        if ($secondValue < $this->min || $secondValue > $this->max) {
            return false;
        }

        if ($firstValue > $secondValue) {
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return "The value must be between {$this->min} and {$this->max}";
    }
}
