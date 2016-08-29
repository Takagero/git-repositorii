<style type="text/css">
.beforeSendShow{
display: block;
}
.error2{
display: none;
}
</style>

<pre>
<?php
//var_dump($fff);
?>
</pre>
<div class="content">
	<input type="text" id="8" placeholder="Город куда везти"><br>
	<input type="text" id="1" placeholder="Длина (метр)"><br>
	<input type="text" id="2" placeholder="Ширира (метр)"><br>
	<input type="text" id="3" placeholder="Высота (метр)"><br>
	<input type="button" class="send" value="Отправить">
	
	<div class="error2" id="error2"><h1>Осторожно, загрузка контента</h1></div>
	<div class="query"></div>
</div>

<script type="text/javascript">
//$(document).ready(function(){
//	$('#8').keyup(function(){
//		if($(this).val().length>2){
//			$.ajax({
//				type:'post',//тип запроса: get,post либо head
//				url:'getTown',//url адрес файла обработчика
//				data:{'str': $(this).val()},//параметры запроса
//				response:'text',//тип возвращаемого ответа text либо xml
//				success:function (res) {
//					var resultTowns = JSON.parse ( res );
//					console.log(resultTowns);
////					console.log(res);
//				}
//			});
//		}
//	});
//});
</script>

<script type="text/javascript">

$(document).ready(function(){
	$('.send').click(function(e){
		
		var gorod = $('#8').val();
		var dlina = $('#1').val();
		var shirina = $('#2').val();
		var visota = $('#3').val();
		
		$.ajax({
		type:'post',//тип запроса: get,post либо head
		url:'buildUrl',//url адрес файла обработчика
		beforeSend: function(){
			$('#error2').removeClass('error2');
			$('#error2').addClass('beforeSendShow');
   		},
		data:{'gorod':gorod, 'dlina':dlina, 'shirina':shirina, 'visota':visota},//параметры запроса
		response:'text',//тип возвращаемого ответа text либо xml
		success:function (data) {//возвращаемый результат от сервера
			console.log(data)
	       var resultString = JSON.parse ( data );
	       var itog = Number(resultString.auto[2]) + Number(resultString.ADD[2]);
			
			html = '<table class="pec-table" border="1" cellpadding="5" cellspacing="5">';
			html += '<tr>';
			html += '<td colspan="3" id="periods"><br> ' + resultString.periods + ' </td>';
			html += '</tr>';
			html += '<tr>';
			html += '<td> ' + resultString.auto[0] + '</td>';
			html += '<td> ' + resultString.auto[1] + '</td>';
			html += '<td> ' + resultString.auto[2] + '</td>';
			html += '</tr>';
			html += '<tr>';
			html += '<td> ' + resultString.deliver[0] + ' <br><b>(не учитывается при рассчете)</b></td>';
			html += '<td> ' + resultString.deliver[1] + '</td>';
			html += '<td> ' + resultString.deliver[2] + '</td>';
			html += '</tr>';
			html += '<tr>';
			html += '<td colspan="2"> ' + resultString.ADD[0] + '</td>';
			html += '<td> ' + resultString.ADD[2] + '</td>';
			html += '</tr>';
			html += '<tr>';
			html += '<td colspan="2"><b>Итого:</b></td>';
			html += '<td> ' + itog + '</td>';
			html += '</tr>';
			html += '</table>';
			$('.query').html(html);
			
			
		},
		complete: function(){
     		$('#error2').removeClass('beforeSendShow');
     		$('#error2').addClass('error2');
   		}
		});
	});
});

</script>