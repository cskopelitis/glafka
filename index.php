<?php
include 'src/HtmlPage.php';
require_once 'model/Course.php';
require_once 'model/Subject.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
<body>
	<?php
	$page=new HtmlPage();
	echo $page->html();

	try {
	 $course=new Course(33);
	 $course->name='G1';
	 $course->subjectId=55;
	 
	 echo $course->name . "<===<br>";
	 echo $course->subjectId;
	}catch(Exception $e){
	 echo $e->getMessage();
	}
	?>
</body>
</html>
