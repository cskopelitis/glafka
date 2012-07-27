(function poll() {
	$.ajax({
		url : "notification-stream.php",
		success : function(notifications) {
			if (notifications.lenght>0) {
				alert('You have ' + notifications.length + ' notification(s)');
				// for (notification in notifications) {
				// }
			}
		},
		error : function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
		},
		dataType : "json",
		complete : poll,
		timeout : 60000
	});
})();
