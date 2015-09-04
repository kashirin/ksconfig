<?php

use yii\helpers\Url;

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;

?>
<table class="table table-hover">
<thead>
	<tr>
		<td><strong>Параметр</strong></td><td><strong>Имя</strong></td><td><strong>Значение</strong></td><td>&nbsp;</td>
	</tr>
</thead>
<tbody>
	<?php
	foreach($variables as $name => $item){?>
	<tr>
		<td><?=$item['label']?></td>
		<td><?=$name?></td>
		<td><?php if($item['value']===false){?>--не установлено--<?}else{?>
			<? if($item['type']=='list'){?>
			<?=$item['values'][$item['value']]?>
			<?}else{?>
			<?=nl2br($item['value'])?>
			<?}?>
			<?}?>
		</td>
		<td><a href="/ksconfig/update/<?=$name?>">edit</a></td>
	</tr>
	<?}?>
</tbody>
</table>