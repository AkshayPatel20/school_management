<?php include('header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Student Details</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('index.php/admin/welcome'); ?>">Dashboard<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php if($this->session->userdata('id')) {  ?> <a class="btn btn-outline-danger my-2 my-sm-0" href="<?= base_url('index.php/Admin/logout'); ?>">Logout</a><?php } ?>
    </form>
  </div>
</nav>

<!-- Details Display -->
<div class="container">
<h4 class="text-info">Student Informations: <a class="text-success small-text small" href="<?= base_url('index.php/admin/add_student'); ?>">(<i class="fas fa-child text-warning"></i> Add New Student)</a></h4>
<!-- Delete Student Flash Message -->
<?php if($msg = $this->session->flashdata('delmsg')): ?>
        <div class="text-danger alert alert-danger"><?php echo $msg; ?> </div><br>
<?php endif;  ?>
<!-- Edit Student flash message -->
<?php if($msg1 = $this->session->flashdata('editmsg')): ?>
        <div class="text-danger alert alert-danger"><?php echo $msg1; ?> </div><br>
<?php endif;  ?>
<?php if($def_st = $this->session->flashdata('def_st')): ?>
        <div class="text-danger alert alert-danger"><?php echo $def_st; ?> </div><br>
<?php endif;  ?>

<table class="table table-striped" id="data">
  <thead>
    <tr>
      <th scope="col">Student Pic</th>
      <th scope="col">Student RollNo</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student Class</th>
      <th scope="col">Student Sex</th>
      <th scope="col">Student Modified Record</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Defaulters</th> 
    </tr>
  </thead>  
  <tbody>
    <?php foreach ($studentinfo as $stud): ?>
      <tr>
        <td><img src="<?php echo $stud->student_photo; ?>" class="rounded-circle" style="height:50px;width:50px;"></td>
        <td><?php echo $stud->student_rollno; ?></td>
        <td><?php echo $stud->student_name; ?></td>
        <td><?php echo $stud->student_class; ?></td>
        <td><?php echo $stud->student_sex; ?></td>
        <td><?php echo $stud->student_modified_at; ?></td>
        <td><a href="<?= base_url();?>index.php/Admin/edit_stud/<?php echo $stud->student_id;?>"><i class="fas fa-edit text-warning"></i></a></td>
        <td><a onclick="return deletechecked();" href="<?= base_url();?>index.php/Admin/remove_stud/<?php echo $stud->student_id;?>"><i class="fas fa-trash"></i></a></td>
        <td><a href="<?= base_url();?>index.php/Admin/blacklist_add/<?php echo $stud->student_id;?>"><i class="fas fa-ban text-danger"></i></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div><!-- DIsplay Container close -->





<script type="text/javascript">

function deletechecked()
    {
        if(confirm("Sure!You want to delete Records?"))
        {
            return true;
        }
        else
        {
            return false;  
        } 
   }

</script>


<?php include('footer.php'); ?>


