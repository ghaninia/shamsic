<?php

namespace GhaniniaIR\SolarCron\Validations;

use Exception;
use GhaniniaIR\SolarCron\Exceptions\NotFoundedDriver;
use GhaniniaIR\SolarCron\Exceptions\ArgumentCountError;
use GhaniniaIR\SolarCron\Validations\Group\GroupValidation;

class ExpressionRule
{

    private const ARGS_RULES = [
        [
            #### ARG 0 VALIDATIONS ####
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    0, 59
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    0, 59
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\MinuteRange::class,
        ], [
            #### ARG 1 VALIDATIONS ####
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    0, 23
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    0, 23
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\HourRange::class,
        ], [
            #### ARG 2 VALIDATIONS ####
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    1, 31
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    1, 31
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\DaysOfMonthRange::class,
        ], [
            #### ARG 3 VALIDATIONS ####
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    1, 12
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    1, 12
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\MonthRange::class,
        ], [
            #### ARG 4 VALIDATIONS ####
            \GhaniniaIR\SolarCron\Validations\Single\AnyValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\Seprator::class => [
                'args' => [
                    0, 6
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\RangeOfValue::class => [
                'args' => [
                    0, 6
                ],
            ],
            \GhaniniaIR\SolarCron\Validations\Single\StepValue::class,
            \GhaniniaIR\SolarCron\Validations\Single\DaysOfWeekRange::class,
        ]
    ];

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

        foreach (SELF::ARGS_RULES[$index] as $driver => $options) {

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
