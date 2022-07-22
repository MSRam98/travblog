<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary justify-content-end">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-dark border border-dark border-2 rounded" href="<?php echo site_url('aboutus');?>">about us</a>
    </li>
    <li class="nav-item px-5">
      <a class="nav-link text-dark border border-dark border-2 px-3 rounded" href="<?php echo site_url('login');?>">Login</a>
    </li>
  </ul>
</nav>

<div>
    <div class="container " style="margin-left:600px;margin-top:50px">
        <div class="row" stlye="margin-to:45px">
            <div class="col-md-3 col-md-offset-4">
                <h4>Create your account</h4><hr>
                <form action="<?php echo site_url('createuser');?>" method="post">
                <?= csrf_field();?>
                <?php if(!empty(session()->getFlashdata('success'))):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success');?></div>
                <?php endif ?>
                <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?= set_value('name')?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : ''?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email"value="<?= set_value('email')?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : ''?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter your passwrd"value="<?= set_value('password')?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'password') : ''?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="cpassword">Confirm password</label>
                        <input type="text" name="cpassword" class="form-control" placeholder="Enter confirm password">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'cpassword') : ''?></span>
                    </div>
                    <div class="from-group mt-2 d-grid">
                       <button class="btn btn-primary btn-block" type="submit">Register</button> 
                    </div>
                </form>
                <div class="mt-2"> Alredy have account login here <a href="<?php echo site_url('login');?>" class="btn btn-sm btn-primary">Login</a> </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>