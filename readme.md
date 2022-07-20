<div align="center">
    <img src="./art/art.png" />
</div>
<h1 align="center">
    Shamsic
</h1>

<!-- <p align="center" dir="rtl">
شاید برای شما پیش اومده که میخواستید از کرون جاب در پروژه تون استفاده کنید و متوجه شدید که نمیتونید تاریخهای دقیق رو که در تقویم شمسی وجود داره مدیریت کنید. برای مثال کرون جاب به شما اجازه میده که اسکریپتتون در روزهای خاص هفته, ماه اجرا بشه! ولی چون کرون از تقویم میلادی پشیبانی میکنه ,مدیریتش برای ایرانی های که از تقویم شمسی استفاده میکنن بی استفاده یا با ضریب دقت کم 
</p> -->

<p>
    Maybe it happened to you that you wanted to use CronJob in your project and you realized that you cannot manage the
    exact dates that are in the solar calendar.
</p>
<p>
    For example, cron job allows you to run your script on specific days of the week, month! But CronJob supports the
    Gregorian calendar.It is useless or can be done with low accuracy for the solar date!
</p>
<p>
    This package allows you to solve this problem inside the PHP code.
</p>

> This package supports `PHP 8.1+`.

<hr />

## Install

Via Composer

``` bash
$ composer require ghaninia/shamsic
```

## How to use

You need to configure the cron job on the server ,The crontab command shown below will activate the cron tasks automatically every minutes:

``` bash 
* * * * * php output.php
```

> '*' is a wildcard, meaning "every time". If you don't have any background about CronJob expressions and don't clear for you, follow the link <a href="https://crontab.guru/">crontab</a>.

The last three expressions of the cronJob are for the day of the month, the month and the day of the week. (Our main problem)


Now, open the file that will be executed by Cron Job (for this example output.php).

```php 
use GhaniniaIR\Shamsic\Schedule;

### At every minute on saturday in farvardin.
(new Schedule)
    ->call(function(){
        echo "test";
    })
    ->cron("* * * 1 2");

### At every minute on every day-of-week from saturday through thursday in khordad.
(new Schedule)
    ->call(function(){
        echo "test";
    })
    ->cron("* * * 3 1-5");

... 


### After writing all the schedules, you must run them
Schedule::run();

```

<p>
 If you want to check that your expression is valid or not :
</p>

```php 
(new ExecuteExpression("* * * * *"))->isValid();
```



