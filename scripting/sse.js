var source = new EventSource('http://localhost:9191/plexus/stream');

source.addEventListener('syncevent', function(e) {
	document.body.innerHTML += e.data;
}, false);

source.addEventListener('open', function(e) {
	document.body.innerHTML += "Connection Opened<br>";
}, false);

source.addEventListener('error', function(e) {
	if (e.currentTarget.readyState == EventSource.CLOSED) {
		document.body.innerHTML += "Connection Closed<br>";
	} else {
		document.body.innerHTML += e.currentTarget.readyState + '<br>';
	}
}, false);
