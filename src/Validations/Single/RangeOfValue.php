<?php

namespace GhaniniaIR\SolarCron\Validations\Single;

use GhaniniaIR\SolarCron\Validations\Interfaces\ValidationContract;

class RangeOfValue implements ValidationContract
{

    public function __construct(
        protected int $min = 0,
        protected int $max = 59,
        protected string $separator = "/"
    ) {
    }

    public function passes($value): bool
    {
        $values = explode($this->separator, $value);

        if (count($values) !== 2) {
            return false;
        }

        $firstValue = $values[0];
        $secondValue = $values[1];



        // foreach ($values as $value) {
        //     ### when $value is not a number ###
        //     if (!is_numeric($value)) {
        //         return false;
        //     }

        //     ### when $value is not in range ###
        //     if ($value < $this->min || $value > $this->max) {
        //         return false;
        //     }
        // }

        return true;
    }

    public function message(): string
    {
        return 'The second range must be a number between 0 and 59.';
    }
}
