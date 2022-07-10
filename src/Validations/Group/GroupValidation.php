<?php

namespace GhaniniaIR\Cron\Validations\Group;

use GhaniniaIR\Cron\Validations\Single\Interfaces\ValidationContract;

class GroupValidation
{

    protected array $validations = [];
    protected bool $passed;
    protected array $errors;

    /**
     * @param $value
     * @param bool $sensitiveToValidations
     */
    public function __construct(protected $value, protected bool $sensitiveToValidations = false)
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
     * @return bool
     */
    public function dispatch()
    {
        $result = [];

        foreach ($this->validations as $validation) {
            $result[] = $isValid = $validation->passes($this->value);
            if (!$isValid) {
                $this->errors[] = $validation->message();
            }
        }

        $this->passed = $this->sensitiveToValidations ?
            !in_array(false, $result) :
            in_array(true, $result);

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
