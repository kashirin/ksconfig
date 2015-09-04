<?php

use yii\helpers\Url;

$this->title = 'Параметр '.$item['label'];
$this->params['breadcrumbs'][] = [
	'label' => 'Настройки',
	'url' => '/ksconfig'
];
$this->params['breadcrumbs'][] = $this->title;

?>

<form method="post">
	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
	<input type="hidden" name="name" value="<?=$item['name']?>">
	<label for="val">Значение параметра</label>
	<?if($item['type'] == 'string' || $item['type']=='int'){?>
	<input class="form-control" type="text" id="val" name="val" value="<?=$item['value']?>">
	<?}elseif($item['type']=='text'){?>
	<textarea class="form-control" rows="3" id="val" name="val"><?=$item['value']?></textarea>
	<?}elseif($item['type']=='list'){?>
	<select class="form-control" id="val" name="val">
		<?foreach($item['values'] as $val => $label){?>
			<?if($val == $item['value']){?>
			<option value="<?=$val?>" selected><?=$label?></option>
			<?}else{?>
			<option value="<?=$val?>"><?=$label?></option>
			<?}?>
		<?}?>
	</select>
	<?}?>
	
    
    
    <br>
	<button type="submit" class="btn btn-primary">Редактировать</button>
</form>