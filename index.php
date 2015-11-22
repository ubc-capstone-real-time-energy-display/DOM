<!DOCTYPE html>
<html>
<body>
<?php 
	$curl_scraped_page = new DOMDocument();
	//open the html
	$url = "file:///C:/xampp/htdocs/test%20text.html";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$curl_scraped_page = curl_exec($ch);
	curl_close($ch);
	
	$links = array();
	$container1 = $curl_scraped_page->getElementById("table-data");//find all element with id table-data
	$container2 = $container1->getElementsByTagName("tr");//find all element inside tag <tr>
	$data = $container2->getElementByTagName("td");//find all element inside tag <td>
		//print out the data
		foreach($datas as $data) {
	$links[] = array(
		'data' => $data
	);
		}
	echo $links;
	
	
	
	
	
	
	
	
	
	
	
	//echo $curl_scraped_page;
	//$data = file_get_contents('test text.html');
	//$regex = '/I am (.+?) this morning/';
	//preg_match_all($regex,$curl_scraped_page,$match);
	//var_dump($match); 
	//echo $match[1];
	//for ()
	?>
</body>
</html>