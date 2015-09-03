<?php

return [
	'variables' => [
                     'class' => \kasser\ksconfig\components\Vars::className(),
                     'config'=> (is_file(__DIR__ . '\\variables.php'))?require(__DIR__ . '\\variables.php'):[]
    			   ]
];