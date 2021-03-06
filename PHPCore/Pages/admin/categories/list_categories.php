<?php require_once "../layout/header.php" ?>

<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col">Thumbnail</th>
      <th scope="col" col="2">Function</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach(get_all('categories') as $categoryData): ?>
        <tr>
        <th scope='row'><?= $categoryData["id"]; ?></th>
        <td><a href="<?= $GLOBALS['ROOT_URL']; ?>/pages/client/category/category_view.php?category_id=<?= $categoryData['id'] ?>"><?= $categoryData["category_name"]; ?></a></td>
        <td><?= $categoryData["category_desc"]; ?></td>
        <td><img class="custom-image-thumbnail" src="../../../<?= $categoryData["thumbnail"]; ?>"/></td>
        <td><a href="<?= $GLOBALS['ROOT_URL']; ?>/pages/admin/categories/edit_category.php?category_id=<?= $categoryData['id'] ?>" class="btn btn-primary btn-sm">EDIT</a></td>
        <td><a href="<?= $GLOBALS['ROOT_URL']; ?>/pages/admin/categories/delete_category.php?category_id=<?= $categoryData['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php require_once "../layout/footer.php" ?>