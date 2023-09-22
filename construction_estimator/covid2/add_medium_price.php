<?php session_start();
//DB conncetion
include_once('../config.php');
error_reporting(0);

if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if($_GET['action']=='delete'){    
$pid=intval($_GET['pid']);  

$query=mysqli_query($con, "delete from medium_master where md_id='$pid'");

  echo "<script>window.location.href='add_medium_price.php'</script>";
}


if(isset($_POST['submit'])){
$cement=$_POST['cement'];
$steel=$_POST['steel'];
$worker=$_POST['worker'];
$sand=$_POST['sand'];
$bricks=$_POST['bricks'];
$profit=$_POST['profit'];



    $query="insert into medium_master(cement,steel,worker,sand,bricks,profit) values('$cement','$steel','$worker','$sand','$bricks','$profit')";
    // print_r($query);exit();
    $result =mysqli_query($con, $query);
    if ($result) 
    {
      echo '<script>alert("Price Added successfully.")</script>';
      echo "<script>window.location.href='add_medium_price.php'</script>";
    } 
    else 
    {
      echo "<script>alert('Something went wrong. Please try again.');</script>";  
      echo "<script>window.location.href='add_medium_price.php'</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Construction Estimator</title>
    <link rel="icon" href="../images/vashista_gurukul.png" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
label{
    font-size:16px;
    font-weight:bold;
    color:#000;
}

</style>
  <script>
function empidAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'employeeid='+$("#empid").val(),
type: "POST",
success:function(data){
$("#empid-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php include_once('includes/sidebar.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
          <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   
  <div class="row match-height">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                <div class="card">
                  <div id="form_data" class="card-body form_data">
                    <h4 class="card-title">Add Price </h4>
                  <form method="post" enctype="multipart/form-data" name="myForm">
                    <div class="form-group row">
                        <div class="col-sm-1">
                        </div>
                        <label class="col-sm-2">Cement Price :</label>
                        <div class="col-sm-3">
                          

                        <input type="text" name="cement" class="form-control" id="cement" placeholder="Enter Cement Price" required />
                        </div>

                        <div class="col-sm-1">
                        </div>
                         <label class="col-sm-2">Steel Price :</label>
                           <div class="col-sm-3">
                          <input type="text" name="steel" class="form-control" id="steel" placeholder="Enter Steel Price" />
                          
                          </div>
                       
                    </div>
                      <!-- </div> -->
                    <div class="form-group row">
                      <div class="col-sm-1">
                        </div>
                      
                    
                      <label class="col-sm-2">Worker Price :</label>
                       <div class="col-sm-3">
                      <input type="text" name="worker" class="form-control" id="worker" placeholder="Enter Worker Price" />
                      </div>
                      <div class="col-sm-1">
                      </div>


                       <label class="col-sm-2">Sand Price :</label>
                        <div class="col-sm-3">
                        <input type="text" name="sand" class="form-control" id="sand" placeholder="Enter Sand Price" />

                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-1">
                        </div>
                      
                    
                      <label class="col-sm-2">Bricks Price :</label>
                       <div class="col-sm-3">
                      <input type="text" name="bricks" class="form-control" id="bricks" placeholder="Enter Bricks Price" />
                      </div>
                      <div class="col-sm-1">
                      </div>


                       <label class="col-sm-2">Profit :</label>
                        <div class="col-sm-3">
                        <input type="text" name="profit" class="form-control" id="profit" placeholder="Enter Profit in % " />

                        
                      </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-2">
                          <input style="background-color: #3a8cd5;color:white" type="submit" value="submit" class="btn  btn-block" name="submit" id="submit">
                        </div>
                       <div class="col-sm-2">
                          <button class="btn btn-primary btn-user btn-block">Cancel</button>
                    </div>
                  </div>
                </form>
              </div><hr><br>

              <div class="card-body tabel_data">
                 <!-- <h4 style="text-align: center;" class="card-title heading"><b>View Expense</b> </h4> -->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="50px" cellspacing="0">
                                   
                                    <tbody>
                                    <?php 
                                    $query=mysqli_query($con,"select * from medium_master");
                                    $cnt=0;
                                    $total_record=$query->num_rows;
                                    while($row=mysqli_fetch_array($query)){
                                    ?>

                                        <tr>
                                          <th>Sno.</th>
                                          <td><?php echo ++$cnt;?></td>
                                        </tr>
                                        <tr> 
                                            <th>Cement Price</th> 
                                            <td><?php echo $row['cement'];?></td>
                                        </tr>
                                        <tr>    
                                            <th>Steel Price</th>
                                            <td><?php echo $row['steel'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Worker Price</th>
                                            <td><?php echo $row['worker'];?></td>
                                        </tr>
                                        <tr>    
                                            <th>Sand Price</th>
                                            <td><?php echo $row['sand'];?></td>
                                        </tr>
                                        <tr>    
                                            <th>Bricks Price</th>
                                            <td><?php echo $row['bricks'];?></td>
                                        </tr>  
                                        <tr>    
                                            <th>Profit</th>
                                            <td><?php echo $row['profit']. "%";?></td>
                                        </tr>  
                                        <tr>  
                                            

                                            <th>Action</th>
                                            <td>
                                              <button class="btn btn-info"><a class="text-white" href="edit_medium_price.php?pid=<?php echo $row['md_id'];?>">Edit </a></button>

                                              <button class="btn btn-danger"><a class="text-white" href="add_medium_price.php?pid=<?php echo $row['md_id'];?>&&action=delete" 
                                              onclick="return confirm('Do you really want to delete this record?');">
                                             Delete</a></button>
                                            </td>
                                            
                                        </tr>
                               <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             </div>
            </div>
          </div>
           <?php include_once('includes/footer.php');?>
        

    <!-- Scroll to Top Button-->
    <?php include_once('includes/footer2.php');?>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
     
var total_record='<?php echo $total_record; ?>'
var x = document.getElementById("form_data");
  if (total_record==0) {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  </script>
  
   
  </body>
</html>
<?php } ?>