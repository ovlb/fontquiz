<section id="quiz-content">
	<?
		$query = 'SELECT * FROM fonts SORT BY img_a';
		
		$result = mysqli_query($con, $query) or die('Error: ' . mysqli_error());
		$count = 0; // Used to close a row after 3 glyphs, will be reset after 3 items
		$countall = 0; // Count all glyphs, no reset
		while($row = mysqli_fetch_object($result)) {
		
		$countall++;
		
		if ($count == 0) {
			echo '<div class="row clearfix">';
		} ?>		
		<div class="buchstabe col third" id="buchstabe-<? . $countall ?>">
			<figure>	
				<img src="img/type/<? echo $row['img_a']; ?>.svg" alt="An e">
			</figure>
			<select name="schriftwahl-<? . $countall ?>" id="schriftwahl-<? . $countall ?>">
				<option value="" selected disabled>Auswahl</option>
				<? while($row = mysqli_fetch_object($result)) { ?>
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
		
		<? if($count == 3) {
			echo "</div><!-- End row -->";
			$count = 0;
		} else {
			$count++;
		}
		}
		mysqli_close($con);
	?>
</section><!-- Ende quiz-content -->