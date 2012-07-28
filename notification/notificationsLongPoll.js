/**
 * @see http://techoctave.com/c7/posts/60-simple-long-polling-example-with-javascript-and-jquery
 */

function poll() {
	$.ajax({
		url : "notification-stream.php",
		success : function(data) {
			if (notifications.lenght > 0) {
				alert('You have ' + notifications.length + 'notification(s)');
				// for (notification in notifications) {
				// }
			}
		},
		dataType : "json"
	});
}

// ------------ Long Polling
// (function poll() {
// $.ajax({
// url : "notification-stream.php",
// success : function(notifications) {
// if (notifications.lenght>0) {
// alert('You have ' + notifications.length + ' notification(s)');
// // for (notification in notifications) {
// // }
// }
// },
// error : function(jqXHR, textStatus, errorThrown) {
// alert(errorThrown);
// },
// dataType : "json",
// complete : poll,
// statusCode: {
// 204: function() {
// alert('User does not exist');
// }
// },
// timeout : 60000
// });
// })();

// ------------ The setTimeout Technique
// (function poll() {
// setTimeout(function() {
// $.ajax({
// url : "notification-stream.php",
// success : function(data) {
// if (notifications.lenght > 0) {
// alert('You have ' + notifications.length
// + 'notification(s)');
// // for (notification in notifications) {
// // }
// }
// poll();
// },
// dataType : "json"
// });
// }, 5000);
// })();

// ------------ Traditional Polling
setInterval(function() {
	poll();
}, 5000);
