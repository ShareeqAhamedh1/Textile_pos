<?php
include 'conn.php';

$sql = "SELECT name,price,price_two FROM tbl_product";
$rs = $conn->query($sql);
if($rs->num_rows >0){
  $csvData = array();
  while($row = $rs->fetch_assoc()){
    $csvData[] = $row;
} }

$today_date = date('Y-m-d');

$fileName = 'price_list_of_'.$today_date.'.csv';

// Set the CSV delimiter
$delimiter = ",";

// Set the CSV column headers
$headers = array('Product', 'Five Stories Price', 'Cardamum Price');

// Create a file pointer
$f = fopen('php://memory', 'w');

// Write the column headers to the CSV file
fputcsv($f, $headers, $delimiter);

// Loop through the CSV data and write each row to the file
foreach ($csvData as $row) {
    fputcsv($f, $row, $delimiter);
}

// Move the file pointer to the beginning of the file
fseek($f, 0);

// Set the appropriate headers to force a download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

// Output the CSV file contents
fpassthru($f);

// Close the file pointer
fclose($f);
