<?php

return [
	'variables' => [
                     'class' => \kasser\ksconfig\components\Variables::className(),
                     'config'=> (is_file(__DIR__ . '\\variables.php'))?require(__DIR__ . '\\variables.php'):[]
    			   ]
];