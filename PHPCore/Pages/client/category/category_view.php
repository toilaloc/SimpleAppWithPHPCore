
<?php require_once "../layout/header.php"; ?>

<?php

    if(isset($_GET['category_id'])){
      
        $category_id = $_GET['category_id'];
    }else {
        die("Lỗi");
    }

?>

<div class="container mt-5">
<?php foreach(show_post_category('posts', $category_id) as $post): ?>
<li><?= $post['id']; ?> <?= $post['post_name']; ?></li>
<?php endforeach; ?>
</div>

<?php require_once "../layout/footer.php"; ?>