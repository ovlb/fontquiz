<?php
	require_once('views/head.php');
	require_once('views/header.php');
?>
<main id="quiz" class="row clearfix">
	<?php
		require_once('views/quiz.instruction.php');
		require_once('views/quiz.content.php');
		require_once('views/quiz.result.php');
	?>
</main>
<?php
	require_once('views/footer.php');
?>