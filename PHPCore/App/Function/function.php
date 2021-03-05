<?php 

function sanitize_slug($text)
{
    $text = preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    return $text;
}

function add($table){
    if($table == 'posts'){

        $post_name = $_POST['post_name'];
        $post_content = $_POST['post_content'];
        $thumbnail = $_POST['thumbnail'];
        $slug = sanitize_slug($_POST['slug']);
        $sql = "INSERT INTO $table (post_name, post_content, thumbnail, slug)
        VALUES ($post_name, $post_content, $thumbnail, $slug)";

    }else if($table == 'categories'){

        $category_name = $_POST['category_name'];
        $category_desc = $_POST['post_content'];
        $thumbnail = $_POST['thumbnail'];
        $slug = sanitize_slug($_POST['slug']);
        $sql = "INSERT INTO $table (category_name, category_desc, thumbnail, slug)
        VALUES ($category_name, $category_desc, $thumbnail, $slug)";

    }else if($table == 'users'){

        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $sql = "INSERT INTO $table (username, fullname, email, pass)
        VALUES ($username, $fullname, $email, $pass)";
    }
    

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function show($table, $id){
    $sql = "SELECT * FROM $table WHERE id = $id";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function edit($table, $id){
    $sql = "SELECT * FROM $table WHERE id = $id";
}

function update($table, $id){

}

function delete($table, $id){
    $sql = "DELETE FROM $table WHERE id = $id";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function get_top_post(){
    $sql = "SELECT 5 FROM posts";
    if ($GLOBALS['conn']->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function get_all($table){
    $sql = "SELECT * FROM $table";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
      <th scope='row'>" . $row["id"]. "</th>
      <td>" . $row["username"]. "</td>
      <td>" . $row["fullname"]. "</td>
      <td>@" . $row["email"]. "</td>
    </tr>";
        }
      } else {
        echo "
        <tr>
        <td>0 results</td>
        </tr>";
      }
      $GLOBALS['conn']->close();
}
