<?php include('header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('index.php/admin/student_detail'); ?>">Student Details<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('index.php/admin/blacklist_student'); ?>">Blacklist Details<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <?php if($this->session->userdata('id')) {  ?> <a class="btn btn-outline-danger my-2 my-sm-0" href="<?= base_url('index.php/Admin/logout'); ?>" >Logout</a><?php } ?>
    </form>
  </div>
</nav>



<div class="card text-center">
  <div class="card-header">
    Student Gender Sex Ratio
  </div>
  <div class="card-body">
        <div id="chart_div"></div>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>


<?php include('footer.php'); ?>

<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php foreach ($stchartrecord as $chart_data_ratio):    ?>
          <?php echo "['".$chart_data_ratio->student_sex."', ".$chart_data_ratio->gender."],";   ?>
          <?php endforeach; ?>
        ]);

        // Set chart options
        var options = {'title':'Student Gender Ratio Analayis',
                       'width':800,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>