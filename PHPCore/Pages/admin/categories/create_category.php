<?php 
    require_once "../layout/header.php";
?>
<div class="container mt-5">
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
     <label for="exampleInputEmail1">Category Name</label>
     <input type="text" name="category_name" class="form-control" placeholder="Enter category name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" name="category_desc" class="form-control"  placeholder="Enter description">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Thumbnail</label>
    <input type="file" name="image" class="form-control" id="thumbnail">
  </div>
  <button type="submit" class="btn btn-primary">Add Cateogry</button>
</form>
</div>



<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
       add('categories');
} 
?>
<?php require_once "../layout/footer.php" ?>