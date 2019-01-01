<?php include('header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Blacklist Student</a>
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
    <!-- <?php if($this->session->userdata('id')) {  ?> <a class="btn btn-outline-danger my-2 my-sm-0" href="<?= base_url('index.php/Admin/logout'); ?>" >Logout</a><?php } ?> -->
    </form>
  </div>
</nav>



<div class="container">

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Rollno</th>
      <th scope="col">Class</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>

</div>




<?php include('footer.php'); ?>

<script type="text/javascript">

$(document).ready(function(){ 

  show_blacklist();

function show_blacklist(){
$.ajax({
    type: 'ajax',
    url  : '<?php echo base_url(); ?>/index.php/Client/show_blacklist',
    async: 'false',
    datatype: 'application/json',

    success: function(data){
      var html = '';
      
      var result = JSON.parse(data);
        console.log(result);
        console.log(result[0].blacklist_name);

      for(var i=0;i<result.length;i++){

        html += '<tr>'+
									'<td>'+result[i].blacklist_id+'</td>'+
									'<td>'+result[i].blacklist_name+'</td>'+
									'<td>'+result[i].blacklist_rollno+'</td>'+
									'<td>'+result[i].blacklist_class+'</td>'+
							    '</tr>';

        }//close for loop
				$('tbody').html(html);
        window.setTimeout(show_blacklist, 1000);
      
      
     
    },
    error: function(){
					alert('Could not get Data from Database');
		}

});

}




});//Document close

</script>