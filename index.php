<!DOCTYPE html>
<html>
<body>
<?php 
	//open the html
    $url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=831317ed-1695-4a28-a197-9d9bad7e727e&dgm=x-pml%3A%2Fdiagrams%2Fud%2FUBC_SUS%2Fsub_diagrams%2Fsub_diagram_totem+park.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog";

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
   // echo $content;

   // $dom = new DOMDocument();
    //$dom->loadHTML($content);
	
	//$data = array();
	//$container1 = $dom->getElementById("hdr");//find all element with id table-data 
	//$container2 = $container1->getElementsByTagName("th");//find all element inside tag <tr>
	//foreach($container2 as $item) {
		//$arr = $item->getElementsByTagName("input");//find all element inside tag <td>
		//$data[] = array(
		//	'number' => $arr
		//);
	//}
	//foreach($data as $element) {
     //   $items = $element['number'];
       // for ($i = 0; $i < $items->length; $i++) {
         //   echo $items->item($i)->nodeValue . "<br />";
        //}
    //}
	
	
	
	
	
	
	
	
	
	
	
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
