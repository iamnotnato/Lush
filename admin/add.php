<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "lush-cosmetics");
if(!isset($_SESSION['sess_user'])){
    header("Location:index.php");
}
else
{

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../images/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   LUSH || DASHBOARD
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="black" data-background-color="black" data-image="img/sidebar-2.jpg">
      <div class="logo"><a href="" class="simple-text logo-normal">
         LUSH 
         <br>
     ADMIN
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="home">
             <span uk-icon="icon: home">Dashboard</span>  
            </a>
          </li>
          
          <li class="nav-item active  ">
            <a class="nav-link" href="products">
             <span uk-icon="icon: home">Products</span>  
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="logout">
             <span uk-icon="icon: home">LOGOUT</span>  
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                 <span uk-icon="icon: check">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                 <span uk-icon="icon: check">Welcome, <?=$_SESSION['sess_user'];?></span>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Product</h4>
                  <p class="card-category">Add New Product</p>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <div class="row">
        
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product Name</label>
                          <input type="text" class="form-control" name="p_name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" class="form-control" name="price">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Image</label>
                          <input type="text" class="form-control" name="image">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <input type="text" class="form-control" name="description">
                        </div>
                      </div>
                
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Quantity</label>
                          <input type="text" class="form-control" name="quantity">
                        </div>
                      </div>
                     

                    </div>
                    
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" name="add">Add Product</button>
                    <div class="clearfix"></div>
                  </form>
                  <?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "lush-cosmetics";

$conn = new mysqli($server, $user, $pass, $dbname);
if(isset($_POST['add'])){
$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$image = mysqli_real_escape_string($conn, $_POST['image']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);


$sql = "INSERT INTO products (p_name, price , image , description , quantity) 
VALUES ('$p_name','$price','$image','$description','$quantity')";

if($conn->query($sql) === TRUE){
?>
  <script>
      alert('Product added successfully.');
    </script>
    <?php
  echo "Product added successfully";
}
else{
  echo "Error" . sql . "<br>" . $conn->error;
}
$conn->close();
}
?>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
  <script type="text/javascript" src="../js/uikit-icons.js"></script>
  <script src="js/core/jquery.min.js"></script>
  <script src="js/core/popper.min.js"></script>
  <script src="js/core/bootstrap-material-design.min.js"></script>
  <script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="js/plugins/chartist.min.js"></script>
  <script src="js/material-dashboard.js?v=2.1.0"></script>
 
  <script>
    $(document).ready(function() {
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
<?php
}
?>
