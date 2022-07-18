<?php

namespace GhaniniaIR\Schedule;

use Exception;
use GhaniniaIR\Schedule\Classes\Expression;
use GhaniniaIR\Schedule\Classes\JalaliCalender;
use GhaniniaIR\Schedule\Exceptions\NotFoundedDriver;
use GhaniniaIR\Schedule\Exceptions\ArgumentCountError;
use GhaniniaIR\Schedule\Validations\Group\GroupPerArgumentValidation;

class ExecuteExpression
{

    private array $expression,
        $passes,
        $errors,
        $statements;

    /**
     * @param string $expression
     * @param JalaliCalender|null $jalaliCalender
     */
    public function __construct(
        string $expression,
        protected ?JalaliCalender $jalaliCalender = null
    ) {
        $this->expression = explode(' ', $expression);
        $this->validator();
    }

    /**
     * validator method for expression 
     * @return bool
     * @throw ArgumentCountError
     */
    private function validator(): bool
    {
        if (count($this->expression) !== 5)
            throw new ArgumentCountError('Too few or more arguments to Cron Expression!');

        return true;
    }

    /** 
     * dispatch method for expression 
     * checking each argument and dispatch it to appropriate method
     * @var string $value 
     * @throws Exception
     * @return self
     */
    public function dispath(): self
    {
        for ($index = 0; $index < count($this->expression); $index++) {

            $arg = $this->expression[$index];
            $driver = Expression::STRUCTURE[$index];

            $driversValidator = $this->driversValidatorForEachArg($driver);

            $argValidator = (new GroupPerArgumentValidation($arg))
                ->setValidations(...$driversValidator)
                ->dispatch();

            $this->passes[] = $result = $argValidator->isPassed();

            if ($result) {
                $getCorrectIndex = $argValidator->getCorrectIndex();
                $statement = $driver[$getCorrectIndex]["statement"] ?? false;
                $this->executeEachArgument($statement, $arg);
            } else {
                $this->errors[] = $index;
            }
        }

        return $this;
    }

    /**
     * get validations for each argument in Cron Expression (args)
     * @param array $validationDrivers
     * @return array
     */
    private function driversValidatorForEachArg(array $validationDrivers): array
    {
        foreach ($validationDrivers as $driver) {

            if (!isset($driver['validation'])) {
                throw new Exception('Driver is not instance of class!');
            }

            $validation = $driver['validation'];

            $driver = is_string($validation) ? $validation : $validation["class"];

            if (!class_exists($driver)) {
                throw new NotFoundedDriver("Validation class: {$driver} not found!");
            }

            try {
                $args = is_array($validation) ? $validation['args'] ?? [] : [];
                $rules[] = new $driver(...$args);
            } catch (Exception $e) {
                throw new ArgumentCountError("Too few or more arguments to {$driver}!");
            }
        }

        return $rules ?? [];
    }

    /**
     * checked each arg of the expression is passed or not 
     * @param string|bool $statement
     * @param string $arg
     * @return void
     */
    private function executeEachArgument(string|bool $statement, mixed $arg): void
    {
        if (is_bool($statement)) {
            $this->statements[] = $statement;
        } elseif (class_exists($statement)) {
            $initialStatement = new $statement($arg, $this->jalaliCalender);
            $this->statements[] = $initialStatement->passed();
        } else {
            $this->statements[] = false;
        }
    }

    /**
     * @return bool
     */
    final public function isValid()
    {
        return !in_array(false, $this->passes);
    }

    /**
     * @return bool
     */
    final public function argsProblematic()
    {
        return $this->errors;
    }

    /**
     * can run callback function ?
     * @return bool 
     */
    final public function canRunCallaback()
    {
        return empty($this->errors) ?
            !in_array(false, $this->statements) :
            false;
    }
}
