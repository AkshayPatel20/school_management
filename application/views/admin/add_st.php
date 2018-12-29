<?php include('header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Add Student Record</a>
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

<!--form to Add Student-->
<?php echo form_open_multipart('Admin/register_student'); ?>

<div class="container alert alert-secondary">

      <?php if($adddetail = $this->session->flashdata('addst')): ?>
        <div class="text-danger alert alert-danger"><?php echo $adddetail; ?> </div><br>
      <?php endif;  ?>

  <div class="row"><div class="col-md-12"><h3 class="text-center text-danger">Add a new Student</h3></div></div><br>  
  <div class="row">
    <div class="col-md-4"><input type="text" class="form-control mb-4" placeholder="Student First Name" name="add_firstst"></div>    
    <div class="col-md-4"><input type="text" class="form-control mb-4" placeholder="Student Middle Name" name="add_middlest"></div>    
    <div class="col-md-4"><input type="text" class="form-control mb-4" placeholder="Student Last Name" name="add_lastst"></div>    
  </div>    
  <!--Error-->
  <div class="row">
    <div class="col-md-4"><?php echo form_error('add_firstst','<div class="text-danger">', '</div>');?></div>    
    <div class="col-md-4"><?php echo form_error('add_middlest','<div class="text-danger">', '</div>');?></div>    
    <div class="col-md-4"><?php echo form_error('add_lastst','<div class="text-danger">', '</div>');?></div>    
  </div>

  <div class="row">
    <div class="col-md-4"><input type="text" class="form-control mb-4" placeholder="Student Rollno" name="add_rollst"></div>    
    <div class="col-md-4"><input type="text" class="form-control mb-4" placeholder="Student class" name="add_classst"></div> 
    <div class="col-md-4"><input type="password" class="form-control mb-4" placeholder="Student Password" name="add_passst"></div>       
  </div> 
  <!--Error-->
  <div class="row">
    <div class="col-md-4"><?php echo form_error('add_rollst','<div class="text-danger">', '</div>');?></div>    
    <div class="col-md-4"><?php echo form_error('add_classst','<div class="text-danger">', '</div>');?></div>    
    <div class="col-md-4"><?php echo form_error('add_passst','<div class="text-danger">', '</div>');?></div>    
  </div>

  <div class="row">
    <div class="dropdown col-md-6">
    <select class="form-control" name="add_genst">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    </div>
    <div class="col-md-6"><input type="file" class="form-control mb-4" placeholder="Student class" name="add_photost"></div>
  </div>  
  <!--Error-->
  <div class="row">
    <div class="col-md-6"></div>  
    <div class="col-md-6"><div class="text-danger"></div></div>        
  </div>    
  
  <div class="row">
  <div class="col-md-12"><button type="submit" class="btn btn-primary btn-lg btn-block">Enroll new Student</button></div></div>
        

</div>

<?php include('footer.php'); ?>

