<?php

namespace GhaniniaIR\SolarCron\Validations\Single\Interfaces;

interface ValidationContract
{
    public function passes($value): bool;
    public function message(): string;
}
