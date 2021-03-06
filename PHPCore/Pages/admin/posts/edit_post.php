<?php 
    require_once "../layout/header.php";
    if(isset($_GET['post_id'])){
      $post_id = $_GET['post_id'];
    }
?>
<div class="container mt-5">
<form method="post" enctype="multipart/form-data">
    <?php foreach(edit('posts', $post_id) as $data):?>
    <div class="form-group">
     <label for="exampleInputEmail1">Category Name</label>
     <input type="text" name="post_name" class="form-control" value="<?= $data['post_name']?>">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="post_content" class="form-control"><?= $data['post_content']?></textarea>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Thumbnail</label>
    <input type="file" name="image" class="form-control" id="thumbnail">
    <img src="../../../<?= $data['thumbnail'];?>" alt="">
    </div>
    <div class="form-group">
  <select name="category_id" class="form-control form-control-sm">
    <?php 
    foreach(get_all('categories') as $category){
        echo "<option value='".$category['id']."'>".$category['category_name']."</option>";
    } 
    ?>
  </select>
    </div>
    <?php endforeach; ?>
  <button type="submit" class="btn btn-primary">Edit Post</button>
</form>
</div>



<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
       update('posts', $post_id);
} 
?>
<?php require_once "../layout/footer.php" ?>