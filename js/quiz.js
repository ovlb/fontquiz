$(document).ready(function() {
// Die Loesungen in der Reihenfolge, in der sie im Quelltext stehen
// var results = ['meta', 'rotis', 'garamond', 'minion', 'palatino', 'avenir', 'univers', 'din', 'futura', 'chaparral', 'fira', 'utopia'];

var items = JSON.parse('<?= $stmt_array_json; ?>');
console.log(items[2].name);

// Variable, um zu gucken, ob es Fehler gibt, in der check-Funktion benoetigt
var errors = 0;

// Variablen fuer die Fehler-/Erfolgsmeldung
var msg;
var newclass;

// Die Richtigkeit der Antworten ueberpruefen, mit (index) kann beim Aufrufen der Funktion eine Variable uebergeben werden
function checkAnswer(index) {
	// In dieser Variable wird der Wert des jeweiligen select-Feldes gespeichert; index+1, da die erste ID im HTML 1 ist, der erste Wert in Javascript aber 0
	var answer = document.getElementById('quiz-answer-' + (index+1)).value;
	
	// Wenn der Wert des select-Felds von dem im results-Arrys gespeicherten abweicht, werden die Fehler hochgezaehlt und das beinhaltende div mit der Fehlerklasse versehen
	// Wenn die Antwort richtig ist, wird das div mit der Erfolgsklasse eingefaerbt
	if (answer != results[index]) {
		errors++;
		document.getElementById('quiz-item-' + (index+1)).setAttribute('class', 'item col third error');
	} else {
		document.getElementById('quiz-item-' + (index+1)).setAttribute('class', 'item col third success');
	}
}

// Erfolgs-/Fehlermeldung definieren, feedback-div einfaerben
function giveFeedback(theMessage, theClass) {
	document.getElementById('feedback').innerHTML = theMessage;
	document.getElementById('feedback').setAttribute('class', theClass);
}

function check() {
	// Fehler (wieder) auf 0 setzen, um bei zweitem Versuch eine korrekte Anzahl Fehler zu zeigen
	errors = 0;
	// Rufe die Funktion checkAnswer fuer jedes Element des Loesungs-Arrays auf und uebergebe die Stelle im Array
	for (i = 0; i < results.length; i++) {
		checkAnswer(i);
	}
	
	if (errors > 0) {
		msg = '<p>Ooops. ' + errors + ' Angaben waren nicht korrekt. Versuche es noch mal.</p>';
		newclass = 'error';
	} else {
		msg = '<p>Herzlichen Gl&uuml;ckwunsch! Du hast alles richtig beantwortet.</p>';
		newclass = 'success';
	}
	giveFeedback(msg, newclass);
}
});