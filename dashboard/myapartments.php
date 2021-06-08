<?php
include("include/top.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header Page header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Your Apartments<sup> <span
                                class="badge badge-info right"><?php echo $_SESSION['new'];?></span></sup></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">My apartments</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="nav nav-pills">
                                <?php
  $name = $_SESSION['Username'];
  $sql = "SELECT * FROM user WHERE `email` = '$name'";
  $result = query($sql);
  $row = mysqli_fetch_array($result);

  $category   = $row['category'];

  if ($category != "user") {
  ?>
                                <a href="./apartment" class="btn btn-primary btn-block"><b>Upload Apartment</b></a>

                                <a href="#activity" data-toggle="tab" class="btn btn-primary btn-block"><b>All
                                        Apartment(s)<sup> <span
                                                class="badge badge-danger right"><?php echo $_SESSION['new'];?></span></sup></b></a>
                                <?php
 }
 ?>


                                <?php
 $r = $_SESSION['Username'];
 $sql="SELECT SUM(sn) AS renst from rent WHERE `tenantmail` = '$r' AND `status` = 'rented'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $a = $row['renst'];
 
    
  ?>
                                <a href="#timeline" data-toggle="tab" class="btn btn-primary btn-block"><b>Rented
                                        Apartment(s)<sup> <span
                                                class="badge badge-danger right"><?php echo $a;?></span></sup></b></a>
                                <?php
              }
              ?>
                                <?php
   $r = $_SESSION['Username'];
 $sql="SELECT SUM(sn) AS prod from rent WHERE `tenantmail` = '$r' AND `status` = 'pending'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $b = $row['prod'];
    
  ?>
                                <a href="#reply" data-toggle="tab" class="btn btn-primary btn-block"><b>Pending
                                        Apartment(s)<sup> <span
                                                class="badge badge-danger right"><?php echo $row['prod'];?></span></sup></b></a>

                                <?php 
              
}
?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                </div>
                <!-- /.col -->
                <div class="col-md-9">

                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">All Apartment(s)</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 15%;">Suite_No.</th>
                                                    <th style="width: 15%;">Image</th>
                                                    <th style="width: 15%;">Apartment Type</th>
                                                    <th style="width: 15%;">Status</th>
                                                    <th style="width: 15%;">Water Type</th>
                                                    <th style="width: 15%;">Power Source</th>
                                                    <th style="width: 15%;">Price</th>
                                                    <th style="width: 15%;"></th>
                                                </tr>
                                            </thead>
                                            <?php
  $r = $_SESSION['Username'];
 $sql="SELECT * FROM apartment WHERE `uploader` = '$r'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>
                                            <tbody>
                                                <tr>
                                                    <td><a href="#"><?php echo $row['apt']; ?></a></td>
                                                    </td>
                                                    <?php          
                    echo '
 <td><img style= "width: 50px; height: 50px;" src= "../upload/apartment/'.$row['pix'].'"  alt="product picture"></td>';
 ?>
                                                    <td><?php echo $row['apartment']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td><?php echo $row['water']; ?></td>
                                                    <td><?php echo $row['power']; ?></td>
                                                    <td>
                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">NGN
                                                            <?php echo number_format($row['price']); ?></div>
                                                    </td>
                                                    <td><a href="./details?id=<?php echo $row['apt']; ?>"> More Details
                                                    </td>
                                                </tr>

                                            </tbody>
                                            <?php
                  }
                  ?>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>

                            </div>
                            <!-- /.card -->
                            <!-- /.post -->
                        </div>


                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->

                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>

                                    <div class="timeline-body">
                                        <div class="card">
                                            <div class="card-header border-transparent">
                                                <h3 class="card-title">Rented Apartment(s)</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 15%;">Suite_No.</th>
                                                                <th style="width: 15%;">Image</th>
                                                                <th style="width: 15%;">Date Paid</th>
                                                                <th style="width: 15%;">Next Pay Date</th>
                                                                <th style="width: 15%;">Tenant Tel</th>
                                                                <th style="width: 15%;">Price</th>
                                                                <th style="width: 15%;"></th>
                                                            </tr>
                                                        </thead>
                                                        <?php
       $r = $_SESSION['Username'];
 $sql="SELECT * FROM rent WHERE `tenantmail` = '$r' AND `status` = 'rented'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>

                                                        <tbody>
                                                            <tr>
                                                                <td><a href="#"><?php echo $row['apt']; ?></a></td>
                                                                </td>
                                                                <?php          
                    echo '
 <td><img style= "width: 50px; height: 50px;" src= "../upload/apartment/'.$row['pix'].'"  alt="product picture"></td>';
 ?>

                                                                <td><?php echo date('D, M d, Y', strtotime($row['paydate'])); ?>
                                                                </td>
                                                                <td><?php echo date('D, M d, Y', strtotime($row['expiry'])); ?>
                                                                </td>
                                                                <td><?php echo $row['tenanttel']; ?></td>
                                                                <td>
                                                                    <div class="sparkbar" data-color="#00a65a"
                                                                        data-height="20">NGN
                                                                        <?php echo number_format($row['price']); ?>
                                                                    </div>
                                                                </td>
                                                                <td><a
                                                                        href="./chat?id=<?php echo $row['tenantmail'] ?>">
                                                                        More Details</td>
                                                            </tr>

                                                        </tbody>
                                                        <?php
                  }
                  ?>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>

                                        </div>
                                        <!-- /.card -->
                                        <!-- /.content -->
                                        <!-- /.content -->
                                    </div>


                                </div>
                                <!-- END timeline item -->

                                <!-- END timeline item -->
                                <!-- timeline item -->




                            </div>
                        </div>


                        <div class="tab-pane" id="reply">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->

                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Pending Apartment(s)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 15%;">Suite_No.</th>
                                                        <th style="width: 15%;">Image</th>
                                                        <th style="width: 15%;">Date Paid</th>
                                                        <th style="width: 15%;">Tenant Tel</th>
                                                        <th style="width: 15%;">Price</th>
                                                        <th style="width: 15%;"></th>
                                                    </tr>
                                                </thead>
                                                <?php
         $r = $_SESSION['Username'];
 $sql="SELECT * FROM rent WHERE `tenantmail` = '$r' AND `status` = 'pending'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>

                                                <tbody>
                                                    <tr>
                                                        <td><a href="#"><?php echo $row['apt']; ?></a></td>
                                                        </td>
                                                        <?php          
                    echo '
 <td><img style= "width: 100px; height: 100px;" src= "../upload/apartment/'.$row['pix'].'"  alt="product picture"></td>';
 ?>

                                                        <td><?php echo date('D, M d, Y', strtotime($row['paydate'])); ?>
                                                        </td>
                                                        <td><?php echo $row['tenanttel']; ?></td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                NGN <?php echo number_format($row['price']); ?></div>
                                                        </td>
                                                        <td><a href="./rdetails?id=<?php echo $row['apt'] ?>">
                                                                Verify Apartment</td>
                                                    </tr>

                                                </tbody>
                                                <?php
                  }
                  ?>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>

                                </div>
                                <!-- /.card -->
                                <!-- END timeline item -->

                                <!-- END timeline item -->
                                <!-- timeline item -->




                            </div>
                        </div>




                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php include("include/footer.php"); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
</body>

</html>