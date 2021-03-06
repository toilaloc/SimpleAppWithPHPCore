<?php require_once "../layout/header.php" ?>

<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Fullname</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach(get_all('users') as $userData): ?>
        <tr>
        <th scope='row'><?= $userData["id"]; ?></th>
        <td><?= $userData["username"]; ?></td>
        <td><?= $userData["fullname"]; ?></td>
        <td><?= $userData["email"]; ?></td>
        <td><?= hash('md5', $userData["pass"]); ?></td>
        <td><a href="<?= $GLOBALS['ROOT_URL']; ?>/pages/admin/users/delete_user.php?user_id=<?= $userData['id'] ?>" class="btn btn-danger btn-sm">DELETE</a></td>
  
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php require_once "../layout/footer.php" ?>