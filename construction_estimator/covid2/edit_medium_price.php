<?php session_start();
//DB conncetion
include_once('../config.php');
//validating Session
error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

//Code for updation
if(isset($_POST['update'])){
$pid=intval($_GET['pid']);    
//getting post values

$cement=$_POST['cement'];
$steel=$_POST['steel'];
$worker=$_POST['worker'];
$sand=$_POST['sand'];
$bricks=$_POST['bricks'];
$profit=$_POST['profit'];




$query="update medium_master set cement='$cement',steel='$steel',worker='$worker',sand='$sand',bricks='$bricks', profit='$profit' where md_id='$pid'";
// print_r($query);exit();
$result =mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Record updated successfully.")</script>';
  echo "<script>window.location.href='add_medium_price.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='edit_medium_price.php'</script>";
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
<?php 
$pid=intval($_GET['pid']);

$query=mysqli_query($con,"select * from medium_master where md_id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query)){

?>                 


<form name="editphlebotomist" method="post" enctype="multipart/form-data">
      <div class="form-group row">
                        <div class="col-sm-1">
                        </div>
                        <label class="col-sm-2">Cement Price :</label>
                        <div class="col-sm-3">
                          

                        <input type="text" name="cement" class="form-control" id="cement" placeholder="Enter Cement Price" value="<?php echo $row['cement']; ?>" required />
                        </div>

                        <div class="col-sm-1">
                        </div>
                         <label class="col-sm-2">Steel Price :</label>
                           <div class="col-sm-3">
                          <input type="text" name="steel" class="form-control" id="steel" placeholder="Enter Steel Price" value="<?php echo $row['steel']; ?>" />
                          
                          </div>
                       
                    </div>
                      <!-- </div> -->
                    <div class="form-group row">
                      <div class="col-sm-1">
                        </div>
                      
                    
                      <label class="col-sm-2">Worker Price :</label>
                       <div class="col-sm-3">
                      <input type="text" name="worker" class="form-control" id="worker" placeholder="Enter Worker Price" value="<?php echo $row['worker']; ?>" />
                      </div>
                      <div class="col-sm-1">
                      </div>


                       <label class="col-sm-2">Sand Price :</label>
                        <div class="col-sm-3">
                        <input type="text" name="sand" class="form-control" id="sand" placeholder="Enter Sand Price" value="<?php echo $row['sand']; ?>" />

                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-1">
                        </div>
                      
                    
                      <label class="col-sm-2">Bricks Price :</label>
                       <div class="col-sm-3">
                      <input type="text" name="bricks" class="form-control" id="bricks" placeholder="Enter Bricks Price" value="<?php echo $row['bricks']; ?>" />
                      </div>
                      <div class="col-sm-1">
                      </div>


                       <label class="col-sm-2">Profit :</label>
                        <div class="col-sm-3">
                        <input type="text" name="profit" class="form-control" id="profit" placeholder="Enter Profit in % " value="<?php echo $row['profit']; ?>" />

                        
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-2">
                          <input style="background-color: #3a8cd5;color:white" type="submit" value="submit" class="btn  btn-block" name="update" id="update">
                        </div>
                       <div class="col-sm-2">
                          <button class="btn btn-primary btn-user btn-block">Cancel</button>
                    </div>
                  </div>
                               
</form>





<?php } ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include_once('includes/footer.php');?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
   <?php include_once('includes/footer2.php');?>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
<?php } ?>