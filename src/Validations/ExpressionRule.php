<?php

namespace GhaniniaIR\SolarCron\Validations;

use Exception;
use GhaniniaIR\SolarCron\Classes\Expression;
use GhaniniaIR\SolarCron\Exceptions\NotFoundedDriver;
use GhaniniaIR\SolarCron\Exceptions\ArgumentCountError;
use GhaniniaIR\SolarCron\Validations\Group\GroupValidation;

class ExpressionRule
{

    private bool $passed;
    private array $errors;

    /**
     * @param string $value
     */
    public function __construct(protected string $value)
    {
    }

    /** 
     * 
     * @var string $value 
     * @throws Exception
     * @return self
     */
    public function dispath(): self
    {
        $args = explode(' ', $this->value);

        ### checked args count ###
        if (count($args) !== 5) throw new ArgumentCountError('Too few or more arguments to Cron Expression!');

        for ($index = 0; $index < count($args); $index++) {

            $arg = $args[$index];

            ### is passed ? ###
            $passed[] = $result = (new GroupValidation($arg))
                ->setValidations(...$this->packedInstanceDrivers($index))
                ->dispatch()
                ->isPassed();

            ### get argument errors ###
            $result ?: $this->errors[] = $index;
        }

        $this->passed = !in_array(false, $passed);
        return $this;
    }

    /**
     * get validations for each argument in Cron Expression (args)
     * @param int $index
     * @return array
     */
    private function packedInstanceDrivers(int $index): array
    {
        $rules = [];

        foreach (Expression::STRUCTURE[$index] as $driver => $options) {

            $driver = is_string($options) ? $options : $driver;

            if (!class_exists($driver))
                throw new NotFoundedDriver("Class {$driver} not found!");

            try {
                $args = is_array($options) ? $options['args'] ?? [] : [];
                $rules[] = new $driver(...$args);
            } catch (Exception $e) {
                throw new ArgumentCountError("Too few or more arguments to {$driver}!");
            }
        }

        return $rules;
    }

    /**
     * @return bool
     */
    final public function passed()
    {
        return $this->passed;
    }

    /**
     * @return bool
     */
    final public function argsProblematic()
    {
        return $this->errors;
    }
}
