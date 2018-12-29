<?php include('header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Defaulter Student</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('index.php/admin/student_detail'); ?>">Student Details<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <?php if($this->session->userdata('id')) {  ?> <a class="btn btn-outline-danger my-2 my-sm-0" href="<?= base_url('index.php/Admin/logout'); ?>" >Logout</a><?php } ?>
    </form>
  </div>
</nav>

<br>

<div class="container">
<div class="row">
    <?php foreach ($black_l as $blacklist_student) :  ?>
    <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <img src="<?php echo $blacklist_student->blacklist_photo; ?>" class="card-img-top" alt="defaulter pic" style="height:200px">
      <div class="card-body">
        <h6 class="card-text"><?php echo $blacklist_student->blacklist_name; ?></h6>
      </div>
    </div>
    </div>
    <?php endforeach; ?>
</div>
</div>

<?php include('footer.php'); ?>
