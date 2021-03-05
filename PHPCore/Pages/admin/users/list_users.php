<?php require_once "../layout/header.php" ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Fullname</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <?php echo get_all('users'); ?>
  </tbody>
</table>

<?php require_once "../layout/footer.php" ?>