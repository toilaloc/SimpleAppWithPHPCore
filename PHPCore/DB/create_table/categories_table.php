<?php 

require "../config.php";

// sql to create table
$sql = "CREATE TABLE categories (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    category_desc VARCHAR(256) NOT NULL,
    thumbnail VARCHAR(520) NOT NULL,
    slug VARCHAR(256) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table users created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }

?>