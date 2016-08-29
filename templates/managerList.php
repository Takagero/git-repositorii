
<div class="content">
	<div>
		<a href="userManager/managerAdd/">Добавить Сущьность</a><br>
		<a href="pec/">Калькулятор ПЭК</a><br>
		
		<form action="appeals/" method="POST">
			<input type="submit" value="Добавить обращение">
			<input type="hidden" value="Nick" name="manager">
		</form>
	</div>
	<?php
	for ($i = 0; $i < count($args); $i++) {
	?>
	<div class="artTitle">
		<div class="artName"><h4>Менеджер: <?=$args[$i]['nameM'];?></h4></div>
		<div class="artNum div-inline-block">Роль: <?=$args[$i]['rolle'];?></div>
		<div class="artName div-inline-block">Процент: <?=$args[$i]['procent'];?></div>
		
		<div class="descriptions">
			<form action="UserManager/ManagerEdit/<?=$args[$i]['id'];?>" method="POST">
				<input type="submit" value="Изменить">
			</form>
		</div>
	</div>
	<?php
	}
	?>
</div>