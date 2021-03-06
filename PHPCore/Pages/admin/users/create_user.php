<?php 
    require_once "../layout/header.php";
?>
<div class="container mt-5">
<form method="post">
    <div class="form-group">
     <label for="exampleInputEmail1">Username</label>
     <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Fullname</label>
    <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Đăng ký</button>
</form>
</div>



<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
       add('users');
} 
?>
<?php require_once "../layout/footer.php" ?>