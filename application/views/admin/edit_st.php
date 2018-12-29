<?php include('header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Edit Student</a>
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

  
<!-- EDIT STUDENT DETAILS -->
<?php echo form_open_multipart('admin/student_save', 'class="form-signin"'); ?>
<div class="container">
<div class="row">
    <div class="col-md-6">
    
    <div class="card" style="width: 18rem;">
    <img src="<?php echo $stud_data->student_photo; ?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?php echo $stud_data->student_name; ?></h5>
        <input type="file" class="form-control mb-4" placeholder="Student Photo" name="st_photo" value="<?php echo $stud_data->student_photo; ?>">
      </div>
    </div>
    
    </div><!--Row1 close-->

    <div class="col-md-3">
      
      <input type="hidden" name="st_id" value="<?php echo $stud_data->student_id; ?>" >
        <div class="form-group">
            <label for="exampleInputEmail1">Student Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $stud_data->student_name; ?>" name="st_name">
            
            <label for="exampleInputPassword1">Student RollNo</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $stud_data->student_rollno; ?>" name="st_rollno">

            <label for="exampleInputEmail1">Student Class</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $stud_data->student_class; ?>" name="st_class">

            <label for="exampleInputEmail1">Student Sex</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $stud_data->student_sex; ?>" name="st_sex">

        </div>
        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
    </div>

</div>
</div><!--CONTAINER CLOSE-->

<?php include('footer.php'); ?>