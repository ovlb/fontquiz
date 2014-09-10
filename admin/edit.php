<?php
require_once('../views/head.php');
require_once('inc/header.php');
?>
<h3><?php echo $results['PageTitle'] ?></h3>
<form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
	<input type="hidden" name="articleId" value="<?php echo $results['article']->idfonts ?>"/>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
			<ul>
				<li>
					<label for="title">Font Name</label>
					<input type="text" name="title" id="title" placeholder="Name of the font" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['article']->name )?>" />
				</li>
				<li>
					<label for="style">Font Style</label>
					<input name="style" id="style" placeholder="Serif or sans serif" required maxlength="1000"><?php echo htmlspecialchars( $results['article']->style )?></textarea>
				</li>
				<li>
					<label for="letter_e">Letter E</label>
					<textarea name="letter_e" id="letter_e" placeholder="The letter e" required maxlength="100"><?php echo htmlspecialchars( $results['article']->letter_e )?></textarea>
				</li>
			</ul>
			<div class="buttons">
				<input type="submit" name="saveChanges" value="Save Changes" />
				<input type="submit" formnovalidate name="cancel" value="Cancel" />
			</div>
		</form>
 
<?php if ( $results['article']->idfonts ) { ?>
		<p><a href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->idfonts ?>" onclick="return confirm('Delete This Article?')">Delete This Article</a></p>
<?php } ?>
<?
require_once('inc/footer.php');
?>