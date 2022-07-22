<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Blog</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary justify-content-end">
  <ul class="navbar-nav">
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 px-4 rounded" href="<?php echo site_url('blogs');?>">Blogs</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('register');?>">Logout</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('profile');?>">Myprofile</a>
    </li>
  </ul>
</nav>

<div>
<div class="container " style="margin-left:400px;margin-top:5px">
        <div class="row" stlye="margin-to:40px">
            <div class="col-md-7 col-md-offset-4">
                <h5>Create your blog</h4><hr>
                <form action="<?php echo site_url('createblog');?>" method="post">
                <?= csrf_field();?>
                <div class="form-group mt-0">
                        <label for="name">Name:</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter blog title" required>
                    </div>
                    <div class="form-group mt-0">
                        <label for="email">Content:</label>
                        <textarea class="form-control" name="content" id="" rows='18' placeholder="Enter blog content" required></textarea>
                    </div>
                   
                    <div class="from-group mt-2 d-grid">
                       <button class="btn btn-primary btn-block" type="submit">Create Blog</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>