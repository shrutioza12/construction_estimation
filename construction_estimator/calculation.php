<?php 
include_once('config.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Construction Estimator</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>
  <!-- =======================================================
  * Template Name: FlexStart - v1.12.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Construction Estimator</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="getstarted scrollto" href="login-form/index.html">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


<?php 

$query=mysqli_query($con,"select * from master");
$cnt=1;
while($row=mysqli_fetch_array($query)){

?>                 

                        <input type="hidden" name="cement" class="form-control" id="cement_price" placeholder="Enter Cement Price" value="<?php echo $row['cement']; ?>" required />
                        
                        <input type="hidden" name="steel" class="form-control" id="steel_price" placeholder="Enter Steel Price" value="<?php echo $row['steel']; ?>" />
                          
                         <input type="hidden" name="worker" class="form-control" id="worker_price" placeholder="Enter Worker Price" value="<?php echo $row['worker']; ?>" />
                     
                        <input type="hidden" name="sand" class="form-control" id="sand_price" placeholder="Enter Sand Price" value="<?php echo $row['sand']; ?>" />

                        <input type="hidden" name="bricks" class="form-control" id="bricks_price" placeholder="Enter Bricks Price" value="<?php echo $row['bricks']; ?>" />
                     
                        <input type="hidden" name="profit" class="form-control" id="profit" placeholder="Enter Profit in % " value="<?php echo $row['profit']; ?>" />



<?php } 


$query=mysqli_query($con,"select * from medium_master");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>
        
                        <input type="hidden" name="cement" class="form-control" id="cement_price_md" placeholder="Enter Cement Price" value="<?php echo $row['cement']; ?>" required />
                        
                        <input type="hidden" name="steel" class="form-control" id="steel_price_md" placeholder="Enter Steel Price" value="<?php echo $row['steel']; ?>" />
                          
                         <input type="hidden" name="worker" class="form-control" id="worker_price_md" placeholder="Enter Worker Price" value="<?php echo $row['worker']; ?>" />
                     
                        <input type="hidden" name="sand" class="form-control" id="sand_price_md" placeholder="Enter Sand Price" value="<?php echo $row['sand']; ?>" />

                        <input type="hidden" name="bricks" class="form-control" id="bricks_price_md" placeholder="Enter Bricks Price" value="<?php echo $row['bricks']; ?>" />
                     
                        <input type="hidden" name="profit" class="form-control" id="profit_md" placeholder="Enter Profit in % " value="<?php echo $row['profit']; ?>" />



<?php } 

?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
   <h1 class="text-center getstarted scrollto"><b> Construction Estimator</b></h1><br><br>
  <form action="#" method="post">
  <div class="row form_content">
    <div class="col-md-1">
    </div>
     <div class="col-md-3">
      <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter Name"><br>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" placeholder="Enter Area Sq.ft" id="area" name="area" value="">
    </div>
    <div class="col-md-3">

    <select class="form-control" id="type" name="type">
        <option value="">Select Type</option>
        <option value="High">High</option>
        <option value="Medium">Medium</option>
     </select>
    </div>
     <div class="col-md-5">
    </div>
    <div class="col-md-4">
      <button style="background-color: #4154f1;" type="button" class=" btn text-white" onclick="calculate_quatation();">Calculate</button>
    </div>
  </div>
  <div style="display: none;" class="row tabel_content">
   <div class="col-md-2">
   </div>
    <div class="col-md-8">
             <table class="table table-bordered" id="dataTable" width="50px" cellspacing="0">
            <br><h1 class="text-center getstarted scrollto"><b>Quatation</b></h1><br><br>
                <tbody>
                            <tr>
                              <th>Material</th>
                               <th>Quantity</th>
                               <th>Price</th>
                              <th>Amount</th>
                            </tr>
                            <tr> 
                                <th>Cement</th> 
                                <td><input style="all: unset;" type="text" id="cement" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="cement_price_show" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="total_cement_amt" name=""></b></td>

                            </tr>
                            <tr>   
                                <th>Steel</th> 
                                <td><input style="all: unset;" type="text" id="steel" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="steel_price_show" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="total_steel_amt" name=""></b></td>
                            </tr>
                            <tr>
                                <th>Worker</th>
                                <td><input style="all: unset;" type="text" id="worker" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="worker_price_show" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="total_worker_amt" name=""></b></td>
                            </tr>
                            <tr>  
                               <th>Sand</th>  
                                <td><input style="all: unset;" type="text" id="sand" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="sand_price_show" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="total_sand_amt" name=""></b></td>
                            </tr>
                            <tr>  
                                <th>Bricks</th>  
                                <td><input style="all: unset;" type="text" id="bricks" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="bricks_price_show" name=""></b></td>
                                <td><input style="all: unset;" type="text" id="total_bricks_amt" name=""></b></td>
                            </tr>
                           
                            <tr style="background-color: #d3d4db4f;">  
                                <th colspan="3"><b>Total Amount</b></th>
                                <td><input style="all: unset;" type="text" id="total_amount" name=""></b></td>
                            </tr>  
                             <tr>  
                                <th colspan="3"><b>Profit</b></th>
                                <td><input style="all: unset;" type="text" id="percent" name=""></b></td>
                            </tr>  
                            <tr style="background-color: #d3d4db4f;">  
                                <th colspan="3"><b>Total Quatation</b></th>
                                <td><input style="all: unset;" type="text" id="quatation" name=""></b></td>
                            </tr>  
                            
                              
                        </tbody>
                    </table>
    </div>
  </div>
</form>
</div>


  </section><!-- End Hero -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
   function calculate_quatation()
   {
    $('.tabel_content').show();
     var type = $('#type').val();
     var user = $('#uname').val();
     var sq_ft = $('#area').val();

    

     if(type=="Medium")
     {
        var cement_price = $('#cement_price_md').val();
        var steel_price = $('#steel_price_md').val();
        var worker_price = $('#worker_price_md').val();
        var sand_price = $('#sand_price_md').val();
        var bricks_price = $('#bricks_price_md').val();
        var profit = $('#profit_md').val();

        var cement = 0.4;
        var qty_cement = sq_ft * cement;
        var total_cement_amt= sq_ft * cement_price;

        
        var steel=1.8;
         var qty_steel = sq_ft * steel;
        var total_steel_amt= sq_ft * steel_price;

        var days = 1;
        var worker=2;
         var qty_worker = sq_ft * worker * days;
        var total_worker_amt= sq_ft * worker_price;


         var sand = 1.8;
         var qty_sand = sq_ft * sand;
        var total_sand_amt= sq_ft * sand_price;


          var bricks = 20;
         var qty_bricks = sq_ft * bricks;
        var total_bricks_amt= sq_ft * bricks_price;


         var total_amount = (total_cement_amt) +  (total_steel_amt) + (total_worker_amt) + (total_sand_amt) + (total_bricks_amt);
         var percent = (Number(profit) / 100) * Number(total_amount);
         var quatation = (total_amount) - (percent);
         // alert(final_amount);
         // alert(quatation);

         $('#cement').val(qty_cement+" Bag");
          $('#cement_price_show').val(cement_price+ " Rs");
          $('#total_cement_amt').val(total_cement_amt+ " Rs");
          $('#steel').val(qty_steel+ " Kg");
          $('#steel_price_show').val(steel_price+ " Rs");
          $('#total_steel_amt').val(total_steel_amt+ " Rs");
          $('#worker').val(qty_worker+ " people");
          $('#worker_price_show').val(worker_price+ " Rs");
          $('#total_worker_amt').val(total_worker_amt+ " Rs");
          $('#sand').val(qty_sand+ " Cft");
          $('#sand_price_show').val(sand_price+ " Rs");
          $('#total_sand_amt').val(total_sand_amt+ " Rs");
          $('#bricks').val(qty_bricks+ " bricks");
          $('#bricks_price_show').val(bricks_price+ " Rs");
          $('#total_bricks_amt').val(total_bricks_amt+ " Rs");
          $('#total_amount').val(total_amount+ " Rs");
          $('#percent').val(percent+ " Rs");
          $('#quatation').val(quatation+ " Rs");

     }
     else
     {
         var cement_price = $('#cement_price').val();
        var steel_price = $('#steel_price').val();
        var worker_price = $('#worker_price').val();
        var sand_price = $('#sand_price').val();
        var bricks_price = $('#bricks_price').val();
        var profit = $('#profit').val();

        var cement = 0.4;
        var qty_cement = sq_ft * cement;
        var total_cement_amt= sq_ft * cement_price;

        
        var steel=1.8;
         var qty_steel = sq_ft * steel;
        var total_steel_amt= sq_ft * steel_price;

        var days = 1;
        var worker=2;
         var qty_worker = sq_ft * worker * days;
        var total_worker_amt= sq_ft * worker_price;


         var sand = 1.8;
         var qty_sand = sq_ft * sand;
        var total_sand_amt= sq_ft * sand_price;


          var bricks = 20;
         var qty_bricks = sq_ft * bricks;
        var total_bricks_amt= sq_ft * bricks_price;


         var total_amount = (total_cement_amt) +  (total_steel_amt) + (total_worker_amt) + (total_sand_amt) + (total_bricks_amt);
         var percent = (Number(profit) / 100) * Number(total_amount);
         var quatation = (total_amount) - (percent);
         // alert(final_amount);
         // alert(quatation);

         $('#cement').val(qty_cement+" Bag");
          $('#cement_price_show').val(cement_price+ " Rs");
          $('#total_cement_amt').val(total_cement_amt+ " Rs");
          $('#steel').val(qty_steel+ " Kg");
          $('#steel_price_show').val(steel_price+ " Rs");
          $('#total_steel_amt').val(total_steel_amt+ " Rs");
          $('#worker').val(qty_worker+ " people");
          $('#worker_price_show').val(worker_price+ " Rs");
          $('#total_worker_amt').val(total_worker_amt+ " Rs");
          $('#sand').val(qty_sand+ " Cft");
          $('#sand_price_show').val(sand_price+ " Rs");
          $('#total_sand_amt').val(total_sand_amt+ " Rs");
          $('#bricks').val(qty_bricks+ " bricks");
          $('#bricks_price_show').val(bricks_price+ " Rs");
          $('#total_bricks_amt').val(total_bricks_amt+ " Rs");
          $('#total_amount').val(total_amount+ " Rs");
          $('#percent').val(percent+ " Rs");
          $('#quatation').val(quatation+ " Rs");

     }

         $.ajax({
          data: {user : user, type : type, sq_ft : sq_ft},
         type: "post",
         url : "add_user.php",
         success: function(data){
         }
});

    }
  </script>

</body>

</html>