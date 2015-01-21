<section id="quiz-content">
	<?
		require_once 'functions.php';
		
		$stmt = DbConnect('SELECT * FROM fonts ORDER BY img_e');
		var_dump($stmt);
		/*$con = new PDO(DB_DSN, DB_USERNAME, DB_PASS);
		$query = 'SELECT * FROM fonts SORT BY img_e';
		
		$st = $con->query($query);
		var_dump($st);*/
		$count = 0; // Used to close a row after 3 glyphs, will be reset after 3 items
		$countall = 0; // Count all glyphs, no reset

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		
		$countall++;
		
		if ($count == 0) {
			echo '<div class="row clearfix">';
		} ?>		
		<div class="buchstabe col third" id="buchstabe-<? $countall ?>">
			<figure>	
				<img src="img/type/<? echo $row['img_e']; ?>.svg" alt="An e">
			</figure>
			<select name="schriftwahl-<? echo $countall ?>" id="schriftwahl-<? echo $countall ?>">
				<option value="" selected disabled>Auswahl</option>
				<? while($row = mysqli_fetch_array($result)) { ?>
				<option value="<? echo $row['name'] ?>"><? echo $row['name_display'] ?></option>
				<? } ?>
	<!--			<option value="rotis">Rotis Sans</option>
				<option value="futura">Futura</option>
				<option value="palatino">Palatino</option>
				<option value="din">DIN Pro</option>
				<option value="chaparral">Chaparral</option>
				<option value="meta">Meta</option>
				<option value="minion">Minion</option>
				<option value="fira">Fira Sans</option>
				<option value="univers">Univers</option>
				<option value="avenir">Avenir</option>
				<option value="utopia">Utopia</option>-->
			</select>
		</div><!-- Ende Buchstabe -->
		
		<? if($count == 2) {
			echo "</div><!-- End row -->";
			$count = 0;
		} else {
			$count++;
		}
		}
	?>
</section><!-- Ende quiz-content -->