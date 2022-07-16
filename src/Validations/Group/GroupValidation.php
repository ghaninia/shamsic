<?php

namespace GhaniniaIR\SolarCron\Validations\Group;

use GhaniniaIR\SolarCron\Validations\Single\Interfaces\ValidationContract;

class GroupValidation
{

    public array $validations = [];
    public bool $passed;
    public array $errors;

    /**
     * @param $value
     */
    public function __construct(protected $value)
    {
    }

    /**
     * set validations for group validation 
     * @param ValidationContract[] $validation
     * @return $this
     */
    public function setValidations(ValidationContract ...$validations): self
    {

        $this->validations = array_merge(
            $this->validations,
            $validations
        );

        return $this;
    }

    /**
     * dispatch validations and set passed status and errors
     * @return self 
     */
    public function dispatch() : self
    {
        $result = [];

        foreach ($this->validations as $validation) {
            $result[get_class($validation)] = $isValid = $validation->passes($this->value);
            if (!$isValid) {
                $this->errors[] = $validation->message();
            }
        }

        $this->passed = in_array(true, $result);
     
        ### clear validations after dispatch ###
        $this->validations = [];
        
        return $this;
    }

    /**
     * is passed ?
     * @return bool
     */
    public function isPassed(): bool
    {
        return $this->passed;
    }

    /**
     * get errors
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
