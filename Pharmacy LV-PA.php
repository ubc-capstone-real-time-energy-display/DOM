<?php 
    error_reporting(E_ERROR);

    function build_table($headers, $data) {
        $html = '<table border="1"><tr>';

        foreach($headers as $header) {
            $html .= "<th>$header</th>";
        }

        $html .= '</tr><tr>';

        foreach($data as $col) {
            $html .= '<td>' . $col[0] . '</td>';
        }

        $html .= '</tr></table>';

        echo $html;
    }

    //open the html
    $url = "http://ion.energy.ubc.ca/ion/Historical/DisplayLogs.aspx?queryId=1c2753d0-bc6e-40fc-8655-480e302f84a2&dgm=//bis-appionpme-p/ION-Ent/config/diagrams/ud/UBC_SUS/sub_diagrams/sub_diagram_pharmacy.dgm&node=VIP.BIS-APPIONPME-P&logServerName=QUERYSERVER.BIS-APPIONPME-P&logServerHandle=327952&isEventLog=";

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
    $content = curl_exec($ch);

    curl_close($ch);

    $dom = new DOMDocument();
    $dom->loadHTML($content);

    // Stores our scraped content
    $data = array();
    $headers = array();

    $table = $dom->getElementById("myTable");
    $rowElements = $table->getElementsByTagName("tr");
    foreach($rowElements as $rowElement) {
        $class = $rowElement->getAttribute("class");

        // Headers
        if ($class === "body") {
            foreach($rowElement->getElementsByTagName('th') as $tableHeaderElement) {
                $headerName = $tableHeaderElement->nodeValue;
                array_push($headers, $headerName);
                array_push($data, array());
            }
        }
        elseif ($class === "dataRow") {
            foreach($rowElement->getElementsByTagName('td') as $i=>$dataElement) {
                $dataValue = $dataElement->nodeValue;
                array_push($data[$i], $dataValue);
            }
        }
    }

    build_table($headers, $data);

