
<?php
// Connect to the database called directions
$connection = mysqli_connect("localhost", "root", "", "robot");

// Check for connection errors
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}



// Query the input table for the highest id
$sql = "SELECT MAX(id) AS max_id FROM robot";
$result = mysqli_query($connection, $sql);

// Check for query errors
if (!$result) {
  die("Query failed: " . mysqli_error($connection));
}

// Fetch the result as an associative array
$row = mysqli_fetch_assoc($result);

// Get the highest id
$highest_id = $row["max_id"];

// Query the input table for the contents of the highest id
$sql = "SELECT * FROM robot WHERE id = $highest_id";
$result = mysqli_query($connection, $sql);

// Check for query errors
if (!$result) {
  die("Query failed: " . mysqli_error($connection));
}

// Fetch the result as an associative array
$row = mysqli_fetch_assoc($result);

// Echo the contents of the highest id in the input table that are not empty
echo "last input: ";
foreach ($row as $key => $value) {
  if (!empty($value)) {
    echo "$value ";
  }
}

// Close the connection
mysqli_close($connection);
?>