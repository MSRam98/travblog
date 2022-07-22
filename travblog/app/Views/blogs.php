<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Blogs</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary justify-content-end">
  <ul class="navbar-nav">
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 rounded" href="<?php echo site_url('createblogpage');?>">Create blog</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('logout');?>">Logout</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('profile');?>">Myprofile<i class="bi bi-person-circle h6"></i></a>
    </li>
  </ul>
</nav>

<div class="">
    <h4>Blogs</h4><hr>
    <div class="list-group col-sm-6" style="margin:auto;">
        <?php foreach($allblogs as $blog):?>
                <li class="list-group-item d-flex justify-content-between align-items-center text-primary"><?php echo($blog['title']);?><span><a href="/viewblog/<?= $blog['id'] ;?>" class="btn btn-primary">view</a></span></li>            
        <?php endforeach ?>
    </div>
</div>
</body>
</html>