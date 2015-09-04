# ksconfig
Yii2 module for key-value settings support


Usage
-----


Typical component usage

```php

$ksconfig = Yii::$app->ksconfig;

$value = $ksconfig->getVar('var_name');

```