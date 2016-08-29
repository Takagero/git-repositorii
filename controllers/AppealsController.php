<?php
class AppealsController extends Controller {
	
	public function actionIndex(){
		
		if (isset($_POST['manager'])) {
			$manager = $_POST['manager'];
		}else {
			$manager = '';
		}
		
		$type['type'] = AppealsRep::getAppeals();
		$type['manager'] = $manager;
		
		$this->render("layout/header", array('title'=>"Менеджер пользователей v1.0", 'header_text'=> __CLASS__,));
		$this->renderTemplate("appeals", $type);
		$this->render("layout/footer", array('footer_text'=>"Footer Content",));
	}
	
	public function actionPurpose(){
		
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
		}else {
			$id = '';
		}
		
		$purpose = AppealsRep::getPurpose($id);
		?>
		<br><br>
		Цель:
		<select name="purpose">
			<?php
			for ($i = 0; $i < count($purpose); $i++){
			?>
				<option class="option2" id="<?=$purpose[$i]['purpose_id'];?>"><?=$purpose[$i]['purpose'];?>
			<?php
			}
			?>
		</select>
			<script type="text/javascript">
			$('.option2').click(function(){
				var typeId2 = $(this).attr('id');
		
				$.ajax({
					url:		'categori',
		  			type:		'post',
		  			cache: 		false, 
		  			dataType:	'text',
		  			data:		({id: typeId2}),
		  			success: function(result){
		  				//alert("Обратные данные " + otvet);
		  				$('.categori').html(result);
		  			}
				});
			});
			</script>
			<?php
	}
	
	public function actionCategori(){
		
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
		}else {
			$id = '';
		}
		
		$categori = AppealsRep::getCategori($id);
		?>
		<br><br>
		Категория:
		<select name="categori">
			<?php
			for ($i = 0; $i < count($categori); $i++){
			?>
				<option class="option3" id="<?=$categori[$i]['categori_id'];?>"><?=$categori[$i]['categori'];?>
			<?php
			}
			?>
		</select>
			<script type="text/javascript">
			$('.option3').click(function(){
				var typeId3 = $(this).attr('id');
		
				$.ajax({
					url:		'result',
		  			type:		'post',
		  			cache: 		false, 
		  			dataType:	'text',
		  			data:		({id: typeId3}),
		  			success: function(result){
		  				//alert("Обратные данные " + otvet);
		  				$('.result').html(result);
		  			}
				});
			});
			</script>
			<?php
	}
	
	public function actionResult(){
		
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
		}else {
			$id = '';
		}
		
		$results = AppealsRep::getResults($id);
		?>
		<br><br>
		Результат:
		<select name="results">
			<?php
			var_dump($results);
			for ($i = 0; $i < count($results); $i++){
			?>
				<option class="option3" id="<?=$results[$i]['results_id'];?>"><?=$results[$i]['results'];?>
			<?php
			}
			?>
		<select>
	
		<?php
//			if ($id == 2 or $id == 3){
		?>
		<br><br>
		Комментарии:<br>
		<textarea rows="7" cols="50" name="comment" id="area_id"  onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'></textarea>
			
			<?php
//		}
	}
	
	public function actionFooadd(){
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['4k9s26n'])) {
			//Тип
			if (isset($_POST['type'])){
				$type = $_POST['type'];
			}else {
				$type = '';
			}
			//Цель
			if (isset($_POST['purpose'])){
				$purpose = $_POST['purpose'];
			}else {
				$purpose = '';
			}
			//Категория
			if (isset($_POST['categori'])){
				$categori = $_POST['categori'];
			}else {
				$categori = '';
			}
			//Результат
			if (isset($_POST['results'])){
				$results = $_POST['results'];
			}else {
				$results = '';
			}
			
			if (isset($_POST['manager'])) {
				$manager = $_POST['manager'];
			}else {
				$manager = '';
			}
			
			var_dump($_POST);
			
		}
	}
}