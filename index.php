<!DOCTYPE html>
<html>
<body>
<?php 
	//open the html
	$url = "localhost:4433/test%20text.html";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($ch);
	curl_close($ch);

    // Print the content
    //echo htmlspecialchars($content);

    $dom = new DOMDocument();
    $dom->loadHTML($content);
	
	$data = array();
	$container1 = $dom->getElementById("table-data");//find all element with id table-data
	$container2 = $container1->getElementsByTagName("tr");//find all element inside tag <tr>
	foreach($container2 as $item) {
		$arr = $item->getElementsByTagName("td");//find all element inside tag <td>
		$data[] = array(
			'number' => $arr
		);
	}
	echo $data;
	
	
	
	
	
	
	
	
	
	
	
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
