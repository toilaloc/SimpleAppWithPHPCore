<?php 

$ROOT_URL = 'http://localhost/phpcore/PHPCORE';

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
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../../../public/images/" . $newfilename);
        $thumbnail = '/public/images/'.$newfilename;
        $category_id = $_POST['category_id'];
        $slug = sanitize_slug($_POST['post_name']);
        $sql = "INSERT INTO $table (post_name, post_content, thumbnail, slug, category_id)
        VALUES ('$post_name', '$post_content', '$thumbnail', '$slug', '$category_id')";

    }else if($table == 'categories'){
        $category_name = $_POST['category_name'];
        $category_desc = $_POST['category_desc'];
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../../../public/images/" . $newfilename);
        $thumbnail = '/public/images/'.$newfilename;
        $slug = sanitize_slug($category_name);
        $sql = "INSERT INTO $table (category_name, category_desc, thumbnail, slug)
        VALUES('$category_name', '$category_desc', '$thumbnail', '$slug')";

    }else if($table == 'users'){

        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if($username != '' && $fullname != '' && $email != '' && $pass != ''){
            $sql = "INSERT INTO $table (username, fullname, email, pass)
            VALUES ('$username', '$fullname', '$email', '$pass')";
        }
    }else{
        echo "Lỗi";
    }

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Thêm mới thành công";
    } else {
    echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function show($table, $id){
    $sql = "SELECT * FROM $table WHERE id = $id";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function show_post_category($table, $category_id){
    $sql = "SELECT * FROM $table WHERE category_id = $category_id";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function edit($table, $id){
    $sql = "SELECT * FROM $table WHERE id = $id";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function update($table, $id){

    if($table == 'posts'){
        $post_name = $_POST['post_name'];
        $post_content = $_POST['post_content'];
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../../../public/images/" . $newfilename);
        $thumbnail = '/public/images/'.$newfilename;
        $slug = sanitize_slug($post_name);
        $category_id =  $_POST['category_id']; 
        $sql = "UPDATE $table
        SET
            `post_name` = '$post_name',
            `post_content` = '$post_content',
            `thumbnail` = '$thumbnail',
            `category_id` = '$category_id',
            `slug` = '$slug'
        WHERE `id` = '$id'";
    }else if($table == 'categories'){
        $category_name = $_POST['category_name'];
        $category_desc = $_POST['category_desc'];
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../../../public/images/" . $newfilename);
        $thumbnail = '/public/images/'.$newfilename;
        $slug = sanitize_slug($category_name);

        $sql = "UPDATE $table
        SET
            `category_name` = '$category_name',
            `category_desc` = '$category_desc',
            `thumbnail` = '$thumbnail',
            `slug` = '$slug'
        WHERE `id` = '$id'";

    }else if($table == 'users'){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "UPDATE $table
        SET
            `username` = '$username',
            `fullname` = '$fullname',
            `email` = '$email',
            `pass` = $pass
        WHERE `id` = '$id'";
    }else{
        echo "Lỗi";
    }

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "Cập nhật thành công";
    } else {
    echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
    // get data form 
 

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
    
        //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //         echo "<tr>
    //   <th scope='row'>" . $row["id"]. "</th>
    //   <td>" . $row["username"]. "</td>
    //   <td>" . $row["fullname"]. "</td>
    //   <td>@" . $row["email"]. "</td>
    // </tr>";
    //     }
        
        return $result;
      
    } else {
        echo "
        <tr>
        <td>0 results</td>
        </tr>";
      }
      $GLOBALS['conn']->close();
}

