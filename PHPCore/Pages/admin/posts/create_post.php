


<?php 
    require_once "../layout/header.php";
?>
<div class="container mt-5">
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
     <label for="exampleInputEmail1">Post Name</label>
     <input type="text" name="post_name" class="form-control" placeholder="Enter category name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea  name="post_content" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Thumbnail</label>
    <input type="file" name="image" class="form-control" id="thumbnail">
  </div>
  <div class="form-group">
  <select name="category_id" class="form-control form-control-sm">
  <?php foreach(get_all('categories') as $category):?>
  <option value="<?= $category['id'] ?>"><?= $category['category_name']; ?></option>
  <?php endforeach; ?>

</select>
</div>
  <button type="submit" class="btn btn-primary">Add Post</button>
</form>
</div>



<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
       add('posts');
} 
?>
<?php require_once "../layout/footer.php" ?>