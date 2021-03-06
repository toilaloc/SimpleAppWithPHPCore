<?php 
    require_once "../layout/header.php";
    if(isset($_GET['category_id'])){
      $category_id = $_GET['category_id'];
    }
?>
<div class="container mt-5">
<form method="post" enctype="multipart/form-data">
    <?php foreach(edit('categories', $category_id) as $data):?>
    <div class="form-group">
     <label for="exampleInputEmail1">Category Name</label>
     <input type="text" name="category_name" class="form-control" value="<?= $data['category_name']?>">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" name="category_desc" class="form-control"  value="<?= $data['category_desc']?>">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Thumbnail</label>
    <input type="file" name="image" class="form-control" id="thumbnail">
    <img src="../../../<?= $data['thumbnail'];?>" alt="">
    </div>
    <?php endforeach; ?>
  <button type="submit" class="btn btn-primary">Add Cateogry</button>
</form>
</div>



<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
       update('categories', $category_id);
} 
?>
<?php require_once "../layout/footer.php" ?>