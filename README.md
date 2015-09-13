# ksconfig
Yii2 module for key-value settings support

Installation
-----

Either run

```
php composer.phar require --prefer-dist kasser/ksconfig "*"
```

or add

```
"kasser/ksconfig": "*"
```

to the require section of your `composer.json` file.

Subsequently, run

```php
./yii migrate/up --migrationPath=@vendor/kasser/ksconfig/migrations
```

in order to create the settings table in your database.


Usage
-----


Typical component usage

```php

$ksconfig = Yii::$app->getModule('ksconfig');

$value = $ksconfig->getVariable('email');

```
