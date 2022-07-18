<?php 

namespace GhaniniaIR\SolarCron\Conditions\Contracts ;

abstract class ConditionArgumentContract
{
    abstract public function passed(): bool;

    public function datetime()
    {
        
        $timezone = new \DateTimeZone(
            options("timezone")
        );

        return new \DateTime($timezone);
    }
}