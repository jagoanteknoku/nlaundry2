<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('admin/_partials/header.php'); ?>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <?php $this->load->view('admin/_partials/sidebar.php'); ?>
    </div>

    <div class="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <?php $this->load->view('admin/_partials/navbar.php') ?>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Penghasilaan</p>
                  <h3 class="card-title"> <?php echo $penghasilan[0]; ?> IDR</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Hari Ini
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">av_timer</i>
                  </div>
                  <p class="card-category">Antrian</p>
                  <h3 class="card-title"><?php echo $antrian ?>
                    <small></small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <div class="stats">
                      <i class="material-icons">update</i> Total Antrian
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">check</i>
                  </div>
                  <p class="card-category">Siap Diambil</p>
                  <h3 class="card-title"><?php echo $siap ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Selesai 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">send</i>
                  </div>
                  <p class="card-category">Selesai</p>
                  <h3 class="card-title"><?php echo $selesai ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Transaksi Selesai
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Laundry Masuk ( Harian ) </h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"> </i>  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Landry Keluar ( Harian ) </h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"> </i>  
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>

      <footer class="footer">
        <?php $this->load->view('admin/_partials/footer.php'); ?>
      </footer>

    </div>

  </div>
  
    <?php $this->load->view('admin/_partials/js.php'); ?>

    <script type="application/javascript">
    charti = {

      initDashboardPageCharts: function() {

        if ($('#completedTasksChart').length != 0 || $('#websiteViewsChart').length != 0) {

          /* ----------==========     Completed Tasks Chart initialization    ==========---------- */

          dataCompletedTasksChart = {
            labels: [<?php foreach ($hari1 as $hari) { echo "'".$hari."' ,"; }?>],
            series: [
              [<?php foreach ($trs_keluar as $trs_keluar) { echo $trs_keluar." ,"; }?>]
            ]
          };

          optionsCompletedTasksChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
              tension: 0
            }),
            low: 0,
            high: <?php echo $max_trs_keluar*1.5; ?>, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
              top: 0,
              right: 0,
              bottom: 0,
              left: 0
            }
          }

          var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);

          // start animation for the Completed Tasks Chart - Line Chart
          md.startAnimationForLineChart(completedTasksChart);


          /* ----------==========     Emails Subscription Chart initialization    ==========---------- */

          var dataWebsiteViewsChart = {
            labels: [<?php foreach ($hari2 as $hari) { echo "'".$hari."' ,"; }?>],
            series: [
              [<?php foreach ($trs_masuk as $trs_masuk) { echo $trs_masuk." ,"; }?>]

            ]
          };
          var optionsWebsiteViewsChart = {
            axisX: {
              showGrid: false
            },
            low: 0,
            high: <?php echo $max_trs_masuk*1.5; ?>,
            chartPadding: {
              top: 0,
              right: 5,
              bottom: 0,
              left: 0
            }
          };
          var responsiveOptions = [
            ['screen and (max-width: 640px)', {
              seriesBarDistance: 5,
              axisX: {
                labelInterpolationFnc: function(value) {
                  return value[0];
                }
              }
            }]
          ];
          var websiteViewsChart = Chartist.Bar('#websiteViewsChart', dataWebsiteViewsChart, optionsWebsiteViewsChart, responsiveOptions);

          //start animation for the Emails Subscription Chart
          md.startAnimationForBarChart(websiteViewsChart);
        }
      },

    }

    </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      charti.initDashboardPageCharts();

    });
  </script>

</body>

</html>
