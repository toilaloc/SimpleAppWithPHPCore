<?php 

require "../config.php";

// sql to create table
$sql = "CREATE TABLE posts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_name VARCHAR(100) NOT NULL,
    post_content VARCHAR(256) NOT NULL,
    thumbnail VARCHAR(520) NOT NULL,
    slug VARCHAR(256) NOT NULL,
    category_id INT(6) UNSIGNED,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table posts created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }

?>