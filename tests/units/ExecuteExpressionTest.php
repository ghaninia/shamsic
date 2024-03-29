<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shamsic\ExecuteExpression;
use GhaniniaIR\Shamsic\Classes\JalaliCalender;

class ExecuteExpressionTest extends TestCase
{

    public function validExpression()
    {
        return [
            ["* * * * *"],
            ["5 0 * 8 *"],
            ["15 14 1 * *"],
            ["0 22 * * 1-5"],
            ["0 0,12 1 */2 *"],
            ["0-59 0-23 1-31 1-12 0-6"],
            ["0,59 0,23 1,31 1,12 0,6"],
            ["59 22 31 12 5"],
            ["0 0,12 1 */2 *"],
            ["0 4 8-14 * *"],
            ["0 0 1,15 * 3"],
            ["1,5 0 1,15 * 3"],
            ["2,8 0 1,15 * 3"],
            ["*/5 0 1,15 * 3"],
            ["0-59 0 1,15 * 3"],
            ["59-59 0 1,15 * 3"],
            ["* * * * 7"],
        ];
    }

    public function invalidExpression()
    {
        return [

            ['0-60 * * * *'],
            ['0,60 * * * *'],
            ['* 0-24 * * *'],
            ['* 0,24 * * *'],

            ['* * 0 * *'],
            ['* * 32 * *'],
            ['* * 0-31 * *'],
            ['* * 0-32 * *'],
            ['* * 0,31 * *'],
            ['* * 0,32 * *'],

            ['* * * 0 *'],
            ['* * * 13 *'],
            ['* * * 0-13 *'],
            ['* * * 0-13 *'],
            ['* * * 0,13 *'],
            ['* * * 0,14 *'],

            ['* * * * 8'],
            ['* * * * 0-7'],
            ['* * * * 0,7'],
        ];
    }

    /** 
     * @test 
     * @dataProvider validExpression
     */
    public function validExecuteExpression($expression)
    {
        $rule = (new ExecuteExpression($expression))->dispath();
        $this->assertTrue($rule->isValid());
    }

    /** 
     * @test 
     * @dataProvider invalidExpression
     */
    public function invalidExecuteExpression($expression)
    {
        $rule = (new ExecuteExpression($expression))->dispath();
        $this->assertFalse($rule->isValid());
    }

    /** 
     * @test 
     */
    public function exceptionErrorsWhenTooFewArgs()
    {
        $this->expectException(\GhaniniaIR\Shamsic\Exceptions\ArgumentCountError::class);
        $rule = (new ExecuteExpression('* * * *'))->dispath();
    }

    /** 
     * @test 
     */
    public function exceptionErrorsWhenTooMoreArgs()
    {
        $this->expectException(\GhaniniaIR\Shamsic\Exceptions\ArgumentCountError::class);
        $rule = (new ExecuteExpression('* * * *'))->dispath();
    }

    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative1()
    {
        $rule = (new ExecuteExpression('* * * * 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(4, $errors[0]);
        $this->assertCount(1, $errors);
    }

    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative2()
    {
        $rule = (new ExecuteExpression('* * * 100 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(3, $errors[0]);
        $this->assertEquals(4, $errors[1]);
        $this->assertCount(2, $errors);
    }

    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative3()
    {
        $rule = (new ExecuteExpression('* * 500 100 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(2, $errors[0]);
        $this->assertEquals(3, $errors[1]);
        $this->assertEquals(4, $errors[2]);
        $this->assertCount(3, $errors);
    }

    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative4()
    {
        $rule = (new ExecuteExpression('* 980 500 100 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(1, $errors[0]);
        $this->assertEquals(2, $errors[1]);
        $this->assertEquals(3, $errors[2]);
        $this->assertEquals(4, $errors[3]);
        $this->assertCount(4, $errors);
    }

    /** 
     * @test 
     */
    public function checkArgsProblematicAlternative5()
    {
        $rule = (new ExecuteExpression('x 980 500 100 8'))->dispath();
        $errors = $rule->argsProblematic();
        $this->assertEquals(0, $errors[0]);
        $this->assertEquals(1, $errors[1]);
        $this->assertEquals(2, $errors[2]);
        $this->assertEquals(3, $errors[3]);
        $this->assertEquals(4, $errors[4]);
        $this->assertCount(5, $errors);
    }

    /** @test */
    public function canRunCallaback()
    {
        $rule = (new ExecuteExpression('* * * * *'))->dispath();
        $result = $rule->canRunCallaback();
        $this->assertTrue($result);
    }

    /** @test */
    public function validDeepCheckMethodCanRunCallaback()
    {
        $dateTime = new DateTime('2020-01-01 01:20:00');
        $jalaliDateTime = new JalaliCalender($dateTime);
        $rule = (new ExecuteExpression('20 1 * * *', $jalaliDateTime))->dispath();
        $result = $rule->canRunCallaback();
        $this->assertTrue($result);
    }

    /** @test */
    public function invalidDeepCheckMethodCanRunCallaback()
    {
        $dateTime = new DateTime('2020-01-01 01:20:00');
        $jalaliDateTime = new JalaliCalender($dateTime);
        $rule = (new ExecuteExpression('21 2 * * *', $jalaliDateTime))->dispath();
        $result = $rule->canRunCallaback();
        $this->assertFalse($result);
    }
}
