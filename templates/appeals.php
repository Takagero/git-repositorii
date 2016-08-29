<?php
//var_dump($args);
echo "Добавляет " . $args['manager'];
?>

<div class="content">
	<form action="fooadd" method="POST">
		<div class="type">
		<br>
			Тип: <br>
				<select name="type">
				<?php
				for ($i = 0; $i < count($args['type']); $i++) {
				?>
					<option class="option1" id="<?=$args['type'][$i]['id'];?>"><?=$args['type'][$i]['types'];?></option>>
				<?php
				}
				?>
				</select>
		</div>
		<div class="purpose"></div>
		<div class="categori"></div>
		<div class="result"></div>
		<input type="submit" value="Добавить" name="4k9s26n">
		<input type="hidden" name="manager" value="<?=$args['manager'];?>">
	</form>
	<br>
	<a href="/branch">Назад</a>
</div>
<script type="text/javascript">
	$('.option1').click(function(){
		var typeId = $(this).attr('id');
		
		$.ajax({
			url:		'purpose',
  			type:		'post',
  			cache: 		false, 
  			dataType:	'text',
  			data:		({id: typeId}),
  			success: function(result){
  				//alert("Обратные данные " + otvet);
  				$('.purpose').html(result);
  			}
		});
	});
	



</script>