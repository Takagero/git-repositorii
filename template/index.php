<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Статистика звонков v.1</title>
        <link rel="stylesheet" href="stylesheet.css">
        <script src="jquery/jquery-1.12.0.js"></script>

    </head>
    <body>


<footer>
    Статистика звонков<br>
   <p>Copyright © 2015</p>
</footer>
        </div>
<script>
$(document).ready(function(){
	$('#add-order').click(function(e){
	//$.ajax('/view/add.php').done(function(res){
	$.ajax('../parsing-date2/index.php').done(function(res){
	$('#add').append("<div class='add-text'>"+res+"</div>");
	console.log(res);
		});
    		//
	});
});
</script>
    </body>
</html>