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
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
        
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-warning">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Products:</span>
                      
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                        <th>ID</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Description</th>
                    </thead>
                    <tbody>
                <?php 
                    $query = "SELECT * FROM products ORDER BY id ASC";
                    $result = mysqli_query($connect, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                      while ($row = mysqli_fetch_array($result)) {
                        ?>
                    
                      <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["p_name"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["description"]; ?> </td>
                        <td><input type="button" class="btn btn-sm btn-danger animation-on-hover btn-simple" 
                        onclick="deleteme(<?php echo $row['id']; ?>)" name="Delete" value="Delete"></td>
                      </tr>
                    
                      <?php
                    }
}
                      ?>
                      <center><a href="add"><input type="button" class="btn btn-sm btn-warning animation-on-hover btn-simple" 
                      name="add" value="Add New Product"></a>
                      <br>
                </center>
    </tbody>
                  </table>

                  <script language="javascript">
  function deleteme(delid)
  {
    if(confirm("Do you want to delete this record?")){
      window.location.href='delete.php?del_id=' +delid+'';
      return true;
    }
  }
</script>
                    </div>
                  </div>
                </div>
              </div>
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
