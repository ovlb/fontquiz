// Die Loesungen in der Reihenfolge, in der sie im Quelltext stehen
var results = ['meta', 'rotis', 'garamond', 'minion', 'palatino', 'avenir', 'univers', 'din', 'futura', 'chaparral', 'fira', 'utopia'];

// Variable, um zu gucken, ob es Fehler gibt, in der check-Funktion benoetigt
var errors = 0;

function checkAnswer(index) {
	// In dieser Variable wird der Wert des jeweiligen select-Feldes gespeichert; index+1, da die erste ID im HTML 1 ist, der erste Wert in Javascript aber 0
	var answer = document.getElementById('schriftwahl-' + (index+1)).value;
	console.log('answer ==' + answer);
	
	// Wenn der Wert des select-Felds von dem im results-Arrys gespeicherten abweicht, werden die Fehler hochgezaehlt und das beinhaltende div mit einer Fehlerklasse versehen
	if (answer != results[index]) {
		errors++;
		console.log('errors ==' + errors);
		document.getElementById('buchstabe-' + (index+1)).className += ' error';
	}
}

// Fehlermeldung anzeigen; diese automatisch wieder ausblenden
function hasErrors() {
	var $msg = '<div class="error">Ooops.' + errors + 'Angaben waren nicht korrekt.</div>';
	
	$msg.css({
            position: 'fixed',
            top: 0,
            left: 0,
            //background: '#e31217',
			width: '100%',
			'z-index': 9999999999,
			display: 'block',
			'text-indent': '32px',
			padding: '5px 0'
		})
		.hide()
		.appendTo('#result')
		.show();
	setTimeout(function() {
		$msg.fadeOut(800, function() { $msg.remove(); });
	}, 3000);
}

function hasNoErrors() {
	var $msg = '<div class="success">Herzlichen Gl&uuml;ckwunsch! Du hast alles richtig beantwortet.</div>';
	
	$msg.css({
            position: 'fixed',
            top: 0,
            left: 0,
            //background: '#e31217',
			width: '100%',
			'z-index': 9999999999,
			display: 'block',
			'text-indent': '32px',
			padding: '5px 0'
		})
		.hide()
		.before('#container')
		.show();
}

function check() {
	// Rufe die Funktion checkAnswer fuer jedes Element des Loesungs-Arrays auf
	for (i = 0; i < results.length; i++) {
		checkAnswer(i);
	}
	
	if (errors > 0) {
		hasErrors();
	} else {
		hasNoErrors();
	}
}