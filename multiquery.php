<h2> mysql => javascript and json file 저장</h2>
<?php

// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "jangseong");
$year = $_GET["year"];
$cardinalnumber = $_GET["cardinalnumber"];
//echo $cardinalnumber;
$result = mysqli_query($conn, "SELECT name FROM  member  where num = '$cardinalnumber' and date like '$year%' GROUP BY name ");
mysqli_set_charset($conn, 'utf8');

// Create empty array for JSON data
$json_data = array();

// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {
    $json_data[] = $row;
}

// Convert PHP array to JSON
$json_output = json_encode($json_data);

echo $json_output;

// Write JSON data to file
$json_file = fopen("data2.json", "w");

fwrite($json_file, $json_output);

fclose($json_file);

// Close MySQL connection
mysqli_close($conn);


?>
