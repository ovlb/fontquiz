<?php
require_once('../views/head.php');
require_once('inc/header.php');
?>
<section id="admininfo">
	<h4>Hello</h4>
	<p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b></p>
	<p><a href="admin.php?action=logout">Log out</a></p>
</section>
<section id="fontlist">
	<h2>All Fonts</h2>
	<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
	<?php } ?>
	<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
	<?php } ?>
	<div class="row clearfix">
		<div class="col half">
			<h3>Name</h3>
		</div>
		<div class="col half">
			<h3>Style</h3>
		</div>
	</div><!-- Ende row -->
	<?php foreach ($results['articles'] as $font) {
		echo '<div class="row clearfix">
			<div class="col half">
				'echo $font->name'
			</div><!-- Ende name -->
			<div class="col half">
				'echo $font->style'
			</div><!-- Ende style -->
		</div><!-- Ende row -->'
	}?>
	<p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
	<p><a href="../admin.php?action=newFont">Add a New Font</a></p>
</section>
<?php
require_once('inc/footer.php');
?>