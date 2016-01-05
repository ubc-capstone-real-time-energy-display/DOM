<?php 

    error_reporting(E_ERROR);

/*    function build_table($headers, $data) {
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
    }*/


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

        // Find date of latest curl
        $last_retrieved_date = false;
        $sql = "SELECT * FROM scrapper_data where location = '$location' AND site_url = '$url_to_scrape' ORDER BY date DESC
                 LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $last_retrieved_date = $row['date']; 
            }   
        } else {
            // No Results found
        }

        // If record was found 
        if($last_retrieved_date){
            $interval = time() - $last_retrieved_date;
            if($interval < 900){
                // if diff is less than 15 mins
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
            $httpCode =  curl_getinfo($ch, CURLINFO_HTTP_CODE);           

            curl_close($ch);
            
            // Read the Http header response code

            // got wrong response
            if ($httpCode != 200){
                 $error_message = $httpCode;
                // STORE ERROR MESSAGE and echo message

                $current_time = time();
                $sql = "INSERT INTO scrapper_data (location, site_url, data_json, date)
                VALUES ('$location', '$url', '$error_message', '$current_time')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                echo "ERROR CODE:".$error_message;
            } 
            else{
                // got correct response 
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

                $final_data = array();

                array_push($final_data, $headers);
                array_push($final_data, $data);

                // json encode data to store in table
                $data_json = json_encode($final_data);

                // Store data into table

                // Create connection
                $current_time = time();

                $sql = "INSERT INTO scrapper_data (location, site_url, data_json, date)
                VALUES ('$location', '$url_to_scrape', '$data_json', '$current_time')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        }

        //build_table($headers, $data);

    }

