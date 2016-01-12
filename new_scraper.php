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


    // Changed to function. Just pass in the URL in the function call. For example: scrapper("https://www.google.ca/")
    function scrapper($url_to_scrape = NULL, $location){

        // DATABASE CONNECTION
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "rted";    

        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        // Connection Successful
        $building_sql = "SELECT * FROM building where url = '$url_to_scrape'";
        $building_result = mysqli_query($conn, $building_sql);
        $building_array = mysqli_fetch_all($building_result);
        $first_building_id = 1;

        // Check when data was last retrieved, based on first building in array
        $last_retrieved_date = false;
        $sql = "SELECT * FROM energy_consumption inner join building on energy_consumption.building_id = building.id where energy_consumption.building_id = '$first_building_id' ORDER BY energy_consumption.timestamp DESC
                 LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $last_retrieved_date = $row['timestamp']; 
            }   
        } else {
            // No Results found
        }

        if($last_retrieved_date){

            // switch month and day around for strtotime to work properly
            $array = explode('/', $last_retrieved_date);
            $tmp = $array[0];
            $array[0] = $array[1];
            $array[1] = $tmp;
            unset($tmp);
            $last_retrieved_date = implode('/', $array);
            $last_retrieved_date = str_replace("/", "-", $last_retrieved_date);
            $last_retrieved_date = strtotime(str_replace(".000", "", $last_retrieved_date));
            
            // Calculate difference in time between now and last retrieve date
            $interval = time() - $last_retrieved_date - 32400; //matching the timezone
            if($interval < 10){
                // if diff is less than 15 mins, then don't need to run again
                $last_retrieved_date = true;
            }       
            else{
                // if diff is more than 15 mins and need to scrape again
                $last_retrieved_date = false;
            }     
        }

        if (!$last_retrieved_date){
            //open the html
            $url = $url_to_scrape;
            $ch = curl_init($url);
            
            $header = array();
            $header[] = 'Accept-Encoding: gzip, deflate, sdch';
            $header[] = 'Accept-Language: en-US,en;q=0.8';
            $header[] = 'Upgrade-Insecure-Requests: 1';
            $header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36';
            $header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
            $header[] = 'Cache-Control: no-cache';

            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt ($ch, CURLOPT_HTTPGET, TRUE); 
            curl_setopt($ch, CURLOPT_HEADER, true);  

            $error_message = null;

            $content = curl_exec($ch);
            //$httpCode =  curl_getinfo($ch, CURLINFO_HTTP_CODE);           

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
                    // Data
                    elseif ($class === "dataRow") {
                        foreach($rowElement->getElementsByTagName('td') as $i=>$dataElement) {
                            $dataValue = $dataElement->nodeValue;
                            array_push($data[$i], $dataValue);
                            
                        }
                        break;
                    }
                }
               /* $new_time = date_create_from_format('d/M/Y H:i:s', $data[0]);         
                $new_time->getTimestamp();*/
                //var_dump($new_time);die.;
                $data_array = array();
                foreach($headers as $key=>$column_title){
                    $keyvalue = array($column_title => $data[$key]);
                    array_push($data_array, $keyvalue);
                }
/*                echo "<pre>";
                print_r($building_array);
                echo "</pre>";

                echo "<pre>";
                print_r($data_array);
                echo "</pre>";*/

                foreach($data_array as $data_entry){

                    if(key($data_entry) == "Timestamp"){
                        $timestamp = $data_entry["Timestamp"][0];
                        $timestamp = strtotime(str_replace(".000", "", $timestamp));
                        $new_timestamp = $timestamp + 3600; 
                    }

                    foreach($building_array as $building){
                        $building_name = $building[1];
                        $key = key($data_entry);
                        if (strpos(strtolower($key), strtolower($building_name)) !== false){
                            $building_id = $building[0];
                            $building_energy = $data_entry[$key][0];
                            $building_energy_float = floatval(preg_replace("/[^-0-9\.]/","",$building_energy));   


                            $sql = "INSERT INTO energy_consumption (building_id, timestamp, energy)
                                            VALUES ('$building_id', '$new_timestamp', '$building_energy')";
                                    
                            if ($conn->query($sql) === TRUE) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                        }
                    }

                }
                $conn->close();

        //build_table($new_headers, $new_data);
        build_table($headers, $data);
        }
    }

