<section id="quiz-content">
	<?
		require_once 'functions.php';
		
		$stmt = DbConnect('SELECT * FROM fonts ORDER BY RAND() LIMIT 6');
		$stmt_array = $stmt->fetchAll(PDO::FETCH_ASSOC); // Results of the query are stored as an array
		var_dump($stmt_array);
		$stmt_array_json = json_encode($stmt_array);
		var_dump($stmt_array_json);
		$stmt_array_name = $stmt_array; // Create a second array to display the names in another order than the pictures
		usort($stmt_array_name, function($a, $b) {
			return strcasecmp( $a['name'], $b['name'] ); // Sorts the second array by name
		});
		
		$count = 0; // Used to close a row after 3 items, will be reset after 3 items
		$countall = 0; // Count all items, no reset
		
		foreach($stmt_array as $row) {
		
		$countall++;
		
		if ($count == 0) {
			echo '<div class="row clearfix">';
		} ?>		
		<div class="quiz-item col third" id="quiz-item-<? echo $countall ?>">
			<figure>	
				<img src="img/type/<? echo $row['img_e']; ?>.svg" alt="An e">
			</figure>
			<select name="quiz-answer-<? echo $countall ?>" id="quiz-answer-<? echo $countall ?>">
				<option value="" selected disabled>Auswahl</option>
				<? foreach($stmt_array_name as $row_name) { ?>
					<option value="<? echo $row_name['name'] ?>"><? echo $row_name['name_display'] ?></option>
				<? } ?>
			</select>
		</div><!-- Ende Buchstabe -->
		
		<? if($count == 2) {
			echo '</div><!-- End row -->';
			$count = 0;
		} else {
			$count++;
		}
		}
	?>
</section><!-- Ende quiz-content -->