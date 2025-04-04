<?php 
include('header.php');
include('../includes/config.php');
if (isset($_POST['txn_form']) && $_POST['txn_form'] == "ahkwebsolutions"  ){
  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $sub = mysqli_real_escape_string($conn, $_POST['sub']);
  $mess = mysqli_real_escape_string($conn, $_POST['mess']);
  $res = mysqli_query($conn,"INSERT INTO `contact`(`name`, `email`, `sub`, `mess`) VALUES ('$name','$email','$sub','$mess')");
  if($res){
      ?>
      <script>
          $(function(){
              Swal.fire(
                  'Success',
                  'Message Send Successfully',
                  'success'
              )

          });
           
  window.setTimeout(function() {
  window.location.href = "index.php";
  }, 1500);
      </script>
      <?php
  }else{
      ?>
      <script>
          $(function(){
              Swal.fire(
                  'Opps',
                  'Internal Server Problem Please Try Again Lates!',
                  'error'
              )

          });
      </script>
      <?php

  }
  
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        
                        <a href="wallet.php" class=" btn btn-sm btn-danger shadow-sm"></i>WALLET BALACE</a>
                        </div>
                      
                        <div class="h5 mb-0 font-weight-bold text-gray-800">₹ <?php echo $wallet_amount?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
    
<!-- Content Row -->
  <?php
                        if($_SESSION['userid'] == "ADMIN" OR ""){
                        
                            ?>

<!-- Content Row admin -->

  

 <?php
                        }
                        ?>
<!-- Content Row admin -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-bullhorn"></i> Notification and Message Center</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-danger-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <?php 
                      
                      $dres = mysqli_query($conn,"SELECT * FROM `newsline` ORDER BY id DESC ");
                      if(mysqli_num_rows($dres)>0){
                        while($data = mysqli_fetch_assoc($dres)){
                            ?>
                <div class="panel-body">
                            <div class="list-group">
                                <span href="#" class="list-item text-info">
                                 <h4>   <i class="fa fa-comment fa-fw"></i> <?php echo $data['newstitle']?>


                                                      <span class="pull-right text-primary small"><em><?php echo date('jS F, Y',strtotime($data['date'])) ?></em>
                                    </span>
                        </h4> 
                        </span>
                              
                                </div>  
                            
                            <!-- /.list-group -->
                          
                        </div>
                        <?php
                        }
                      }
                      ?>
                </div>
               
            
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      
            <!-- Card Body -->
          
            
            <div class="card card-default">
              <div class="card-header">
               
                <h6 class="card-title m-0 font-weight-bold text-danger"><i class="fas fa-bullhorn"></i> WELCOME  <?php echo $_SESSION['name'] ?></h6>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-danger">
                  <h5>SEND US MESSAGE</h5>
                </div>
                <form action="" name="contact" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="text-transform:uppercase" id="inputName" name="name" placeholder="Full name"value="<?php echo $_SESSION['name'] ?>" required="">
            <input type="hidden" name="txn_form" value="ahkwebsolutions">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
          <input type="text" class="form-control" id="inputEmail"  name="email" placeholder="Please enter your e-mail"value="<?php echo $_SESSION['emailid'] ?>" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
<select name="sub" class="form-control" required>
<option value="">Select</option>
<option value="WALLET UPDATE">WALLET UPDATE</option>
<option value="APPLICATION RELATED">APPLICATION RELATED</option>

</select>
			  
				  </div>
          <div class="input-group mb-3">
          <textarea id="inputName" class="form-control" style="text-transform:uppercase" name="mess" placeholder="Please enter your message"value="" required="" rows="4"></textarea>
                    <div class="input-group-append">
              <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                   </div>
                  </div>
                     </div>
            <div class="input-group mb-3">
              <button type="submit" class="btn btn-primary btn-block">SEND</button>
              <div class="input-group-append">
            </div>
            <!-- /.col -->
          </div>
        </form>
        <div class="card-body">
                <div class="callout callout-success">
                  <h6>CONTACT: <?php echo $ahkweb['phone']?></h6>

                </div>
                </div>
                 </div>
               </div>
                 </div>
                 </div>
                 
              <!-- /.card-body -->
            

<!-- Content Row -->
<script src="https://fastbestprintportal.org.in/arjun/asset/js/jquery-3.5.1.min.js"></script>
<script src="https://fastbestprintportal.org.in/arjun/asset/js/bootstrap.bundle.min.js"></script>
<script src="https://fastbestprintportal.org.in/arjun/asset/js/google-maps.js"></script>
<script src="https://fastbestprintportal.org.in/arjun/asset/vendor/wow/wow.min.js"></script>
<script src="https://fastbestprintportal.org.in/arjun/asset/js/theme.js"></script>
<script>

        document.addEventListener('DOMContentLoaded', function () {

            Swal.fire({
                title: "ALL SERVICES ARE WORKING FINE AND MANY MORE SERVICES ARE COMING SOON",
                text: 'powered By  |:⁠-THEME SEVA:⁠-|🙏😊🙏',
                icon: 'success'
            });
        });
    </script>
</body>

</html>
        

</div>
<!-- End of Main Content -->
