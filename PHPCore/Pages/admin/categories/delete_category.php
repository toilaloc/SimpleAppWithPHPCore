<?php

if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];
}

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "phpcore";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

require_once "../../../DB/config.php";

// sql to delete a record
$sql = "DELETE FROM categories WHERE id= $category_id";

if ($conn->query($sql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>