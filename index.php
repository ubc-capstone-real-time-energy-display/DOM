
<?php 
    //open the html
    $url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=831317ed-1695-4a28-a197-9d9bad7e727e&dgm=x-pml:/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_totem%20park.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";

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
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt ($ch, CURLOPT_HTTPGET, TRUE); 
    $content=curl_exec($ch);

    /*
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_HTTPGET, TRUE); 
    $content = curl_exec($ch);
     */
    curl_close($ch);

    // Print the content
    //ec4ho htmlspecialchars($content);
    //echo $content;


    $dom = new DOMDocument();
    $dom->loadHTML($content);

    $data1 = array();
    $header1 = $dom->getElementById("hdr");
    foreach($header1 as $input) {
        //$inputs = $data1['name'];
        for ($a = 0; $a < $header1->length; $a++){
            echo $header1->input($a)->nodeValue . "<br />";
        }
    }
    /*$header2 = $header1->getElementsByTagName("th");
    foreach ($header2 as $value){
        $arr1 = $value->getElementsByTagName("input");
        $data1[] = array(
            'name' => $arr1
            );
    }

    foreach($data1 as $input) {
        $inputs = $data1['name'];
        for ($a = 0; $a < $inputs->length; $a++){
            echo $inputs->input($a)->nodeValue . "<br />";
        }
    }
        
    

    //$header3 = $header2->getElementById("hdr");
    //$header3 = $header2->getElementsByTagName("span");
    //$header4 = $header3->getElementsByTagName("th"); //find all elements inside tag <th>
    /*foreach ($header2 as $building) {
        $arr1 = $building->getElementsByTagName("input"); //find all the building name inside tag <input>
        $data[] = array(
            'name' => $arr1
            );
    }
    //$timeheader = $header[0];
    //echo $timeheader;  //frint out the time header
    foreach ($data as $value) {
        $buildings = $value['name'];
        for ($a = 0; $a < $buildings->length; $a++){
            echo $buildings->$building($a)->nodeValue . "<br />"; //print out the building header
        }

    }*/
    
    
    $data = array();
    $container1 = $dom->getElementById("data");//find all element with id data 
    $container2 = $container1->getElementsByTagName("tr");//find all element inside tag <tr>
    foreach($container2 as $item) {
        $arr = $item->getElementsByTagName("td");//find all element inside tag <td>
        $data[] = array(
            'number' => $arr
        );
    }
    
   /* foreach($data as $element) {
        $items = $element['number'];
        for ($i = 0; $i < $items->length; $i++) {

            echo $items->item($i)->nodeValue . "<br />"; 
        }
    }*/
    function build_table($data){
        $html = '<table>';
        foreach($data as $energy){
            
        $html .= '<tr>';
        $items = $energy['number'];
            for ($i = 0; $i < $items->length; $i++){
            $html .= '<td>' . $items->item($i)->nodeValue . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
    }
    echo build_table($data);
?>

