<!DOCTYPE html>
<html>
<body>
<?php 
	$data = file_get_contents('test text.html');
	$regex = '/I am (.+?) this morning/';
	preg_match($regex,$data,$match);
	var_dump($match); 
	echo $match[1];
	?>
</body>
</html>