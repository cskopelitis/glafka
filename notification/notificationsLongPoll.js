(function poll() {
	$.ajax({
		url : "/glafka/notification-stream.php",
		success : function(notifications) {
			for (notification in notifications) {
			}
		},
		dataType : "json",
		complete : poll,
		timeout : 30000
	});
})();
