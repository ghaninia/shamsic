<?php 

namespace GhaniniaIR\SolarCron\Validations\Single;

use GhaniniaIR\SolarCron\Validations\Interfaces\ValidationContract;

class SecondRange implements ValidationContract
{

    public function __construct(
        protected int $min = 0 ,
        protected int $max = 59 , 
    ){}

    public function passes($value): bool
    {
        $values = explode( "," , $value);
        
        foreach ($values as $value) {
            ### when $value is not a number ###
            if (!is_numeric($value)) {
                return false;
            }

            ### when $value is not in range ###
            if ($value < $this->min || $value > $this->max) {
                return false;
            }
        }

        return true ;
    }

    public function message(): string
    {
        return "The range must be a number between {$this->min} and {$this->max}.";
    }
}
