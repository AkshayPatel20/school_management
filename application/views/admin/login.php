<?php include('header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Login Form</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <!-- <a class="nav-link" href="<?= base_url('index.php/admin/welcome'); ?>">Dashboard<span class="sr-only">(current)</span></a> -->
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    </form>
  </div>
</nav>

<div class="container text-center">
    <h3 class="alert alert-success text-info">Admin Login</h3>
    <!-- Login Form -->

    <?php echo form_open('Login/index', 'class="form-signin"'); ?>

      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  
      <?php if($error = $this->session->flashdata('login_failed')): ?>
        <div class="text-danger"><?php echo $error; ?> </div><br>
      <?php endif;  ?>
  
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="ad_Username" placeholder="Email address" value="<?php echo set_value('ad_Username'); ?>" required autofocus>
      <p><?php echo form_error('ad_Username','<div class="text-danger">', '</div>');?></p>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="ad_Password" placeholder="Password">
      <p><?php echo form_error('ad_Password','<div class="text-danger">', '</div>');?></p>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>


</div><!-- Container CLose -->



<?php include('footer.php');  ?>