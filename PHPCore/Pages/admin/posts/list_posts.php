<?php require_once "../layout/header.php" ?>

<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Post Name</th>
      <th scope="col">Thumbnail</th>
      <th scope="col" col="2">Function</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach(get_all('posts') as $postData): ?>
        <tr>
        <th scope='row'><?= $postData["id"]; ?></th>
        <td><a href="<?= $GLOBALS['ROOT_URL']; ?>/pages/client/post/post_view.php?category_id=<?= $postData['id'] ?>"><?= $postData["post_name"]; ?></a></td>
        <td><img class="custom-image-thumbnail" src="../../../<?= $postData["thumbnail"]; ?>"/></td>
        <td><a href="<?= $GLOBALS['ROOT_URL']; ?>/pages/admin/posts/edit_post.php?post_id=<?= $postData['id'] ?>" class="btn btn-primary btn-sm">EDIT</a></td>
        <td><a href="<?= $GLOBALS['ROOT_URL']; ?>/pages/admin/posts/delete_post.php?post_id=<?= $postData['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php require_once "../layout/footer.php" ?>