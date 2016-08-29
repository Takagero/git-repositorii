<?php
if (isset($args['passMD'])) {
	$passMD = $args['passMD'];
}else {
	$passMD = '';
}
?>
<div class="content">
	<form action="" method="GET">
		<div>
			Сгенерировать пароль в MD5<sup>x2</sup>:<br>
			<input type="text" id="value" name="newPass" placeholder="Введите буквы"><input type="submit" id="generatePass" value="Сгенерировать">
			<div class="appendMD">
			Сгенерированный пароль: <?=$passMD;?>
			</div>
		</div>
	</form>
	<form action="" method="POST">
		<?php
		
		foreach ($args['managers'] as $manager){
		?>
		
		<div class="block-edit">
			ID: <?=$manager['user_id'];?>
		</div>
		<div class="block-edit">
			Name: <input type="text" value="<?=$manager['login'];?>" name="name">
		</div>
		<div class="block-edit">
			Pass: <input type="text" value="<?=$manager['pass'];?>" name="pass">
		</div>
		<div class="block-edit">
			%: <input type="text" value="<?=$manager['procent'];?>" name="procent">
		</div>
		<div class="block-edit">
			Access: <input type="text" value="<?=$manager['rolle'];?>" name="dostup">
		</div>
		
		<?php
		}
		?>
		<div class="block-edit">
			<input type="hidden" name="id" value="<?=$manager['user_id'];?>">
			<input type="submit" name="saveEdit" value="Сохранить"><br><br>
		</div>
	</form>
	<a href="/branch">Назад</a>
</div>