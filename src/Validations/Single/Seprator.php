<?php

namespace GhaniniaIR\SolarCron\Validations\Single;

use GhaniniaIR\SolarCron\Validations\Single\Interfaces\ValidationContract;

class Seprator implements ValidationContract
{

    public function __construct(
        protected int $min,
        protected int $max,
    ) {
    }

    public function passes($value): bool
    {
        if (!str_contains($value , ",")) {
            return false;
        }

        $values = explode(",", $value);

        foreach ($values as $value) {

            if(!is_numeric($value)) {
                return false;
            }

            ### when $value is not in range ###
            if ($value < $this->min || $value > $this->max) {
                return false;
            }
        }

        return true;
    }

    public function message(): string
    {
        return "The range must be a number between {$this->min} and {$this->max}.";
    }
}
