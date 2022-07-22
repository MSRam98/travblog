<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>My profile</title>
</head>
<body>
<div>
  <nav class="navbar navbar-expand-sm bg-primary justify-content-end">
    <ul class="navbar-nav">
      <li class="nav-item px-3">
        <a class="nav-link text-dark border border-dark border-2 px-4 rounded" href="<?php echo site_url('blogs');?>">Blogs</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('logout');?>">Logout</a>
      </li>
    </ul>
  </nav>  
  <div class="col-sm-6 border my-3"style="margin:auto;">
    <div class="d-flex">
    <div class="p-3">Name:<?php echo($data['name'])?></div>
    <div class="p-2"><h3><i class="bi bi-person-circle"></i></h3></div>
    </div>
    <div class="p-3">Email:<?php echo($data['email'])?></div>
  </div>
  <div class="" style="margin:auto;">
      <div class="col-sm-6" style="margin:auto;"><h4>My Blogs</h4><hr></div>
      <div class="list-group col-sm-6" style="margin:auto;">
          <?php foreach($blogs as $blog):?>
                  <li class="list-group-item  align-items-center text-primary"><?= $blog['title']?><div class="my-2"><span><a href="/editblogpage/<?= $blog['id']?>" class="btn btn-success">Edit</a></span><span class="px-3"><a href="/viewblog/<?= $blog['id']?>" class="btn btn-primary">view</a></span></div></li>            
          <?php endforeach ?>
      </div>
  </div>
</div>
</body>
</html>