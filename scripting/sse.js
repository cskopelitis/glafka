function registerListeners() {
	registerSource('publish.php');
}

function registerSource(sourceId) {
	var source = new EventSource(sourceId);

	source.addEventListener('message', function(res) {
		alert(res.data);
	});
}