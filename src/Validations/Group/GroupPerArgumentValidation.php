<?php

namespace GhaniniaIR\Shamsic\Validations\Group;

use GhaniniaIR\Shamsic\Validations\Single\Interfaces\ValidationContract;

class GroupPerArgumentValidation
{

    private int   $correctIndex;
    private array $validations = [];
    private array $errors;
    private bool  $passed;

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
    public function dispatch(): self
    {
        $result = [];

        $index = 0;

        foreach ($this->validations as $validation) {

            $result[] = $isValid = $validation->passes($this->value);

            if (!$isValid) {
                $this->errors[] = $validation->message();
            } else {
                $this->correctIndex = $index;
                break;
            }

            $index++;
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

    /**
     * get passed validations
     * @return int
     */
    public function getCorrectIndex(): int
    {
        return $this->correctIndex;
    }
}
