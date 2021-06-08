<?php include("include/top.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Support<sup> <span class="badge badge-info right"><?php echo $_SESSION['al'];?></span></sup></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Support Ticket</li>
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
                 <?php
 $sql="SELECT * FROM user WHERE `email` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>         

                <h3 class="profile-username text-center"><?php echo $row['name']; ?></h3>

                <p class="text-muted text-center"><?php echo $row['email']; ?></p>

               <div class="nav nav-pills">
                 
                <a href="#activity" data-toggle="tab" class="btn btn-primary btn-block"><b>Inbox <sup> <span class="badge badge-danger right"><?php echo $_SESSION['de'];?></span></sup></b></a>
                <a href="#timeline" data-toggle="tab" class="btn btn-primary btn-block"><b>Open New Ticket</b></a>
                <a href="#reply" data-toggle="tab" class="btn btn-primary btn-block"><b>Ticket Reply<sup> <span class="badge badge-danger right"><?php echo $_SESSION['re'];?></span></sup></b></a>
                <?php
            $rew = $_SESSION['Username'];
$sll="SELECT SUM(sn) AS ot from support WHERE `Username` = '$rew' AND `Status` = 'Open'";
$rsult_set= query($sll);
while($ow= mysqli_fetch_array($rsult_set))
{
  $_SESSION['r'] = $ow['ot'];
}
 ?>   
                <a href="#sent" data-toggle="tab" class="btn btn-primary btn-block"><b>View Sent Ticket<sup> <span class="badge badge-danger right"><?php echo $_SESSION['r'];?></span></sup></b></a>
                <a href="#cont" data-toggle="tab" class="btn btn-primary btn-block"><b>Contact us</b></a>
              </div>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                  <?php 
}
?>
          
          </div>
          <!-- /.col -->
          <div class="col-md-9">
           
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                  <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <tr>
                      <?php
                      $u = $_SESSION['Username'];
 $sql="SELECT `ref`, `msg`, `date`, `status` from support_reply WHERE `usname` = '$u' AND `other` = '1'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
$x = $row['msg'];
$z = str_word_count($x);
$w = "<a href='./inbox?id=".$row['ref']."'>...Read Full Details</a>";
  $y = substr_replace($x, $w, $z);
if (empty($result_set)) {
  echo '';
 } else {
  ?>                
                    <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href=""><?php echo $row['ref']; ?></a></td>
                    
                    <td class="mailbox-subject"><b><?php echo $y; ?> </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?php echo $row['date'];?></td>

                  </tr>
                  <?php
              }
              }
              ?>
                  </tbody>
                </table> 
                
                <!-- /.table -->
              </div>

              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
                    <!-- /.post -->
                  </div>


<div class="tab-pane" id="cont">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                     
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>                    

                          <div class="timeline-body">
                                     <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Contact us</h3>

              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                                    <tr>
                    <td class="mailbox-subject"><a href="https://wa.me/2348103171902
"><i class="" ></i>Whatsapp</a>
                    </td>
                    

                  </tr>

                  <tr>
                    <td class="mailbox-subject"><a href="https://m.me/doteightplus
"><i class="" aria-hidden="true"></i>Facebook & Messenger </a>
                    </td>
                    

                  </tr>
                  <tr>
                    <td class="mailbox-subject"><a href="mailto: support@dotlive.com.ng"><i class="" aria-hidden="true"></i>Email</a>
                    </td>
                    

                  </tr>
                  <tr>
                    <td class="mailbox-subject"><a href="tel: +2348103171902
"><i class="" aria-hidden="true"></i>Call Support </a>
                    </td>
                   

                  </tr>
                    </td>
                   

                  </tr>
                  </tbody>
                </table> 
                
                <!-- /.table -->
              </div>

              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->

        </div>
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
                      <div>                    

                          <div class="timeline-body">
                                             <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Ticket Reply</h3>

              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <tr>
                      <?php
                      $u = $_SESSION['Username'];
 $sql="SELECT `ref`, `msg`, `date`, `status` = 'unread' from support_reply WHERE `usname` = '$u' AND `sn` = '1'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
$x = $row['msg'];
$z = str_word_count($x);
$w = "<a href='./trep?id=".$row['ref']."'></a>";
  $y = substr_replace($x, $w, $z);
if (empty($result_set)) {
  echo '';
 } else {
  ?>                
                    <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href=""><?php echo $row['ref']; ?></a></td>
                    <td class="mailbox-subject"><b><?php echo $y; ?>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?php echo date('D, M d, Y', strtotime($row['date'])); ?></td>

                  </tr>
                  <?php
              }
              }
              ?>
                  </tbody>
                </table> 
                
                <!-- /.table -->
              </div>

              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->

        </div>         
    <!-- /.content -->
    <!-- /.content -->
                          </div>
                         
                        
                      </div>
                      <!-- END timeline item -->
                     
                      <!-- END timeline item -->
                      <!-- timeline item -->
                     
                     
                    
                     
                    </div>
                  </div>


                  <div class="tab-pane" id="sent">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                     
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>                    

                          <div class="timeline-body">
                     <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Your Support Ticket(s)</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          ID
                      </th>
                      <th style="width: 20%">
                          Message
                      </th>
                      <th style="width: 30%">
                          Date Sent
                      </th>
                      
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                     
                  </tr>
              </thead>
                             </thead>
         <?php
 $sql="SELECT * FROM support WHERE `Username` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['SupportRef']; ?> 
                      </td>
                      <td>
                          <a>
                             <?php echo $row['Msg']; ?>
                          </a>
                          <br/>
                         
                      </td>
                      <td>
                          <ul class="list-inline">
                             
                              <li class="list-inline-item">
                              <?php echo $row['Datesent']; ?>
                              </li>
                             
                          </ul>
                      </td>
                     
                      <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['Status']; ?></span>
                      </td>
                     
                  </tr>
                 
                  
                 
              </tbody>
              <?php
            }
            ?>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
                          </div>
                         
                        
                      </div>
                      <!-- END timeline item -->
                     
                      <!-- END timeline item -->
                      <!-- timeline item -->
                     
                     
                    
                     
                    </div>
                  </div>
                  <!-- /.tab-pane -->


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                     
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>                    

                          <div class="timeline-body">
                          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Enter your support message</h3>
              </div>
              <?php rev(); ?>
              <form method="post">
              <!-- /.card-header -->
              <div class="card-body">
               
                <div class="form-group">
                    <textarea id="compose-textarea" name="msg" class="form-control" style="height: 300px">
                      
                    
                    </textarea>
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                 
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
            </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
           
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
                          </div>
                         
                        
                      </div>
                      <!-- END timeline item -->
                     
                      <!-- END timeline item -->
                      <!-- timeline item -->
                     
                     
                    
                     
                    </div>
                  </div>
                  <!-- /.tab-pane -->

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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
</body>
</html>