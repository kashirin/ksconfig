<?php

use yii\helpers\Url;

$this->title = Yii::t('ksconfig', 'Settings');
$this->params['breadcrumbs'][] = $this->title;

?>
<table class="table table-hover">
<thead>
	<tr>
		<td><strong><?=Yii::t('ksconfig', 'Param')?></strong></td><td><strong><?=Yii::t('ksconfig', 'Name')?></strong></td><td><strong><?=Yii::t('ksconfig', 'Value')?></strong></td><td>&nbsp;</td>
	</tr>
</thead>
<tbody>
	<?php
	foreach($variables as $name => $item){?>
	<tr>
		<td><?=$item['label']?></td>
		<td><?=$name?></td>
		<td><?php if($item['value']===false){?>--<?=Yii::t('ksconfig', 'Not setted')?>--<?}else{?>
			<? if($item['type']=='list'){?>
			<?=$item['values'][$item['value']]?>
			<?}else{?>
			<?=nl2br($item['value'])?>
			<?}?>
			<?}?>
		</td>
		<td><a href="/ksconfig/update/<?=$name?>"><?=Yii::t('ksconfig', 'Edit')?></a></td>
	</tr>
	<?}?>
</tbody>
</table>