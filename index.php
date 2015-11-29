<!DOCTYPE html>
<html>
<body>
<?php 
	//open the html
    $url = "test%20text.html";

    $ch = curl_init($url);
    
    $header = array();
    $header[] = 'Accept-Encoding: gzip, deflate, sdch';
    $header[] = 'Accept-Language: en-US,en;q=0.8';
    $header[] = 'Upgrade-Insecure-Requests: 1';
    $header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36';
    $header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
    $header[] = 'Cache-Control: max-age=0';
    $header[] = 'Cookie: optimizelyEndUserId=oeu1418599389529r0.5078673399984837; __utma=104057284.76261087.1431701012.1431701012.1431701012.1; _ga=GA1.2.1183602756.1408083741; __unam=68ab37d-14cb95e09d0-256b0b02-3; optimizelySegments=%7B%221383931086%22%3A%22gc%22%2C%221395171933%22%3A%22search%22%2C%221398641027%22%3A%22false%22%7D; optimizelyBuckets=%7B%7D; ASP.NET_SessionId=gyoxskbr3mqsvwaddbz15wbr';
    $header[] = 'Connection: keep-alive';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    $content=curl_exec($ch);

    /*
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_HTTPGET, TRUE); 
	$content = curl_exec($ch);
     */
	curl_close($ch);

    // Print the content
    //echo htmlspecialchars($content);
    //echo $content;

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
	//$timedata = $data[0];
	//echo $timedata; <br> //print out time data
	foreach($data as $element) {
        $items = $element['number'];
        for ($i = 1; $i < $items->length; $i++) {
            echo $items->item($i)->nodeValue . "<br />"; 
        }
    }
	/*
	$header = array();
	$header1 = $dom->getElementById("hdr"); //find all elements with id hdr
	$header2 = $timeheader1->getElementsByTagName("th"); //find all elements inside tag <th>
	foreach ($header2 as $building) {
		$arr1 = $bulding->getElementsByTagName("input"); //find all the building name inside tag <input>
		$header[] = array(
			'name' => $arr1
			);
	}
	$timeheader = $header[0];
	echo $timeheader; <br> //frint out the time header
	foreach ($header as $value) {
		$buildingheaders = $value['name'];
		for ($a = 1; $a < $buildingheaders->length; $a++){
			echo $buildingheaders->$buildingheader($a)->nodeValue . "<br />"; //print out the building header
		}

	}

	}
	
	formating 
	<table>
		<tr>
			<td>$timeheader</td>
			<td>buildingheader(1)</td>
			<td>buildingheader(2)</td>
			<td>buildingheader(3)</td>
			<td>buildingheader(4)</td>
			<td>buildingheader(5)</td>
			<td>buildingheader(6)</td>
			<td>buildingheader(7)</td>
			<td>buildingheader(8)</td>
		</tr>
		<tr>
			<td>$timedata<td>
			<td>item(1)</td>
			<td>item(2)</td>
			<td>item(3)</td>
			<td>item(4)</td>
			<td>item(5)</td>
			<td>item(6)</td>
			<td>item(7)</td>
			<td>item(8)</td>
		</tr>
	</table>
	*/
	
	
	
	
	
	
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
