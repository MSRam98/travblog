<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Blogs</title>
</head>
<body>
<div>
<nav class="navbar navbar-expand-sm bg-primary justify-content-end">
  <ul class="navbar-nav">
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('blogs');?>">Blogs</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('logout');?>">Logout</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('profile');?>">Myprofile</a>
    </li>
  </ul>
</nav>
<div class="d-flex justify-content-center my-2">
  <h3><?php echo($blog['title']);?></h3>
</div>
<div class="col-sm-7" style="margin:auto;">
<hr>
  <?php echo($blog['content']);?>
</div>
</div>
</body>
</html>