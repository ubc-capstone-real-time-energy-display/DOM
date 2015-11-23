<!DOCTYPE html>
<html>
<body>
<?php 
	//open the html
	$url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=831317ed-1695-4a28-a197-9d9bad7e727e&dgm=x-pml:/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_totem%20park.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($ch);
	curl_close($ch);

    // Print the content
    //echo htmlspecialchars($content);

    $dom = new DOMDocument();
    $dom->loadHTML($content);
	
	$data = array();
	$container1 = $dom->getElementById("data");//find all element with id table-data 
	$container2 = $container1->getElementsByTagName("tr");//find all element inside tag <tr>
	foreach($container2 as $item) {
		$arr = $item->getElementsByTagName("td");//find all element inside tag <td>
		$data[] = array(
			'number' => $arr
		);
	}
	foreach($data as $element) {
        $items = $element['number'];
        for ($i = 0; $i < $items->length; $i++) {
            echo $items->item($i)->nodeValue . "<br />";
        }
    }
	
	
	
	
	
	
	
	
	
	
	
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
