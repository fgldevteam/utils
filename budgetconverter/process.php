<?php
//$file = "preformatted.csv";
ini_set('auto_detect_line_endings', TRUE);

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "utils";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$rows = array_map('str_getcsv', file('preformatted.csv'));
$header = array_shift($rows);

$csv = array();

$i=0;

foreach ($rows as $row) {
	
  $csv[] = array_combine($header, $row);

  $store = $csv[$i]['Store_Number'];
  $category = $csv[$i]['CATEGORY'];
  
  $j=0;
  foreach( $csv[$i] as $data){

  	$day = (string) $header[$j];
  	
  	switch($day){
  		case "CATEGORY":
  			echo "something was skipped \n";	
  			break;
  		case "Store_Number":
  			echo "something was skipped \n";
  			break;
  		default:
  			$sql = "INSERT INTO budget (store_number, category, calendar_day, budget) VALUES ('".$store."', '".$category."', '".$day."', '".$data."')";
		
		  	if ($conn->query($sql) === TRUE) {
		    	echo "New record created successfully for store " . $store . " on " . $day . " --> " . $data . "\n";
			} else {
			    echo "Error: " . $sql . "\n" . $conn->error;
			}  	

  	}

	$j++;
  }
  
  $i++;
}

echo "\n\n";
echo "We are done...\n";

$conn->close();
echo "Disconnected";
