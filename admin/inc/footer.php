		<footer id="mainfooter">
			<div class="row clearfix">
				<section class="col half" id="footer-git">
					<h4>Git it</h4>
					<p>Der Code ist auf <a href="https://github.com/ovlb/fontquiz">GitHub</a> einsehbar.</p>
					<a href="https://github.com/ovlb/fontquiz"><img src="img/github.svg" alt="GitHub Mark"></a>
				</section>
				<section class="col half">
					<h4>Meta</h4>
					<p><em>What the e?</em> wurde von <a href="http://ovlb.net">Oscar Braunert</a> geschrieben und unter der <a href="license.html">MIT Lizenz</a> ver&ouml;ffentlicht.</p>
				</section>
				
			</div>
		</footer>
	</div><!-- Ende Container -->
<?php
use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$debugbar["messages"]->addMessage("hello world!");
?>
<html>
<head>
    <?php echo $debugbarRenderer->renderHead() ?>
</head>
<body>
    ...
    <?php echo $debugbarRenderer->render() ?>
</body>
</html>
</body>
</html>