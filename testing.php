<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "lush-cosmetics");
if(!isset($_SESSION['sess_user'])){
  header("Location:login.php");
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
<meta name="theme-color" content="LightGray">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>LUSH COSMETICS</title>
    <link rel="shortcut icon" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/material.css" />

 
</head>
  
<body>
<nav class="uk-navbar uk-margin" uk-navbar>
        <div class="uk-navbar-center">
    
            <div class="uk-navbar-center-left"><div>
                <ul class="uk-navbar-nav">
                    <li><a href="#">FOUNDATIONS </a></li>
                    <li><a href="#">SETTING SPRAYS</a></li>
                    <li class="uk-active"><a href="#">LOGGED IN AS:</a></li>
                </ul>
            </div></div>
                    <a class="uk-navbar-item uk-logo" href=""><?=$_SESSION['sess_user'];?></a>
                  </a>
            <div class="uk-navbar-center-right"><div>
                <ul class="uk-navbar-nav">
                <li><a href="logout">LOGOUT</a></li>
                    <li><a href="#">LIPKITS</a></li>
                    <li><a href="login">EYE PALLETE</a></li>
                </ul>
            </div></div>
        </div>
    </nav>
    <center><a href="home"><img width="25%" src="images/test.png"></a></center>
        <nav class="uk-navbar uk-margin" uk-navbar>
    <div class="uk-navbar-center">

        <div class="uk-navbar-center-left"><div>
            <ul class="uk-navbar-nav">
              
                <li><a href="#">BLOG </a></li>
                <li><a href="#">ABOUT</a></li>
            </ul>
        </div></div>
                <a class="uk-navbar-item uk-logo" href="shop">SHOP
              </a>
        <div class="uk-navbar-center-right"><div>
            <ul class="uk-navbar-nav">
                <li><a href="#">SOUV</a></li>
                <li><a href="login">LOGIN</a></li>

            </ul>
        </div></div>
    </div>
</nav>
<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
    <nav class="uk-navbar-container" uk-navbar="dropbar: true;" style="position: relative; z-index: 980;">
        <div class="uk-navbar-center">

            <ul class="uk-navbar-nav">
               
            </ul>

        </div>
    </nav>
</div>
<br>

<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "lush-cosmetics";

$conn = new mysqli($server, $user, $pass, $dbname);
if(isset($_POST['submit'])){
$customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
$town = mysqli_real_escape_string($conn, $_POST['town']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);


$sql = "INSERT INTO testing (customer_name, town , phone_number) 
VALUES ('$customer_name','$town', '$phone_number')";

if($conn->query($sql) === TRUE){
?>
  <script>
      alert('Your order has been placed successfully.');
    </script>
    <?php
  echo "Your order has been placed";
}
else{
  echo "Error" . sql . "<br>" . $conn->error;
}
$conn->close();
}
?>
<br>
<hr class="uk-divider-icon">
   <center><h6 class="uk-comment-meta uk-margin-remove-top">ORDER DETAILS</h6></center>
<center>  <p class="uk-comment-meta uk-margin-remove-top">Kindly Place One Order At A Time</p></center>
   <hr class="uk-divider-icon">
   <div style="clear:both"></div>
<div class="table-responsive">
  <table class="uk-table">
    <caption class="uk-text-center">SHOPPING CART</caption>
    <tr>
      <th width="10%">Product Name </th>
      <th width="15%">Quantity </th>
      <th width="10%">Price Details </th>
      <th width="10%">Order Total</th>
      <th width="5%">Action </th>
    </tr>
    <?php
    if(!empty($_SESSION["cart"]))
    {
      $total = 0;
      foreach ($_SESSION["cart"] as $keys=> $values)

  {
    ?>
    <tr>
      <td><?php echo $values["item_name"]; ?> </td>
      <td><?php echo $values["item_quantity"]; ?> </td>
      <td> KES <?php echo $values["product_price"]; ?> </td>
      <td> KES <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?> </td>
      <td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?> "><button class="text-danger">X</button></a>
      </td>
        
    </tr>
    <?php
    $total = $total + ($values["item_quantity"] * $values["product_price"]);
    $item_quantity = ($values["item_quantity"]);
    $product_name = ($values["item_name"]);
 }
 ?>
  <tr>
    <td colbutton="3" align="right">Total </td>
    <td align="right">KES <?php echo number_format($total, 2); ?></td>
    <td></td>
  </tr>
</table>
<br>
</div>
</div>
<form action="" method="post" class="responsive uk-text-center">
  <hr class="uk-divider-icon">
<center><h6 class="uk-comment-meta uk-margin-remove-top">ORDER DETAILS</h6></center>
<hr class="uk-divider-icon">
<div uk-grid>
    <div class="uk-width-1@s">
            <div class="uk-margin">
        <div class="uk-inline">
          <button class="uk-button uk-button-secondary">Name</button>
          <button class="uk-margin-small-right" uk-icon="user"></button>
            <input class="uk-input uk-active" name="customer_name" type="text" value="<?=$_SESSION['sess_user'];?>">
        </div>
    </div>

     <div class="uk-margin">
        <div class="uk-inline">
                     <button class="uk-button uk-button-secondary">Town</button>
          <button class="uk-margin-small-right" uk-icon="location"></button>
            <input uk-tooltip="Kindly Enter The Town To Be Delivered To"  class="uk-input" type="text" name="town">
        </div>
    </div>
     <div class="uk-margin">
        <div class="uk-inline">
        
                     <button class="uk-button uk-button-secondary">Phone Number</button>
          <button class="uk-margin-small-right" uk-icon="call"></button>
            <input uk-tooltip="Kindly Enter The Town To Be Delivered To"  class="uk-input" type="text" name="phone_number">
        </div>
    </div>
    <div class="uk-width-1@s">
   <div class="uk-margin">
        <div class="uk-inline">
                    <button class="uk-button uk-button-secondary">Product Name</button>
          <button class="uk-margin-small-right" uk-icon="cart"></button>
            <input class="uk-input" type="text" name="product_name" value="<?php echo $product_name;?>">
        </div>
    </div>

   <div class="uk-margin">
        <div class="uk-inline ">
                    <button class="uk-button uk-button-secondary">Quantity</button>
          <button class="uk-margin-small-right" uk-icon="cart"></button>
            <input class="uk-input" type="text" name="quantity" value="<?php echo $item_quantity;?>">
        </div>
    </div>
    <div class="uk-margin">
        <div class="uk-inline">
                    <button class="uk-button uk-button-secondary">Total KES:</button>
          <button class="uk-margin-small-right" uk-icon="credit-card"></button>
            <input class="uk-input" type="text" name="total" value="<?php echo $total;?>">
        </div>
    </div>

 

                </div>

        </div>
    </div>
</div>
<br>

<br>
 <center> <input class="uk-button uk-button-default uk-button-small" type="submit" value="ORDER" name="submit"></center>
<br>
<br>
</form>
  <?php
}
?>
<script type="text/javascript" src="js/uikit.min.js"></script>
<script type="text/javascript" src="js/uikit-icons.js"></script>
    <script type="text/javascript" src="js/material.min.js"></script>
    <script src="js/jquery-3.3.1.js" type="text/javascript"></script>

</body>
<footer class="mdl-mega-footer">
    <div class="mdl-mega-footer__middle-section">
  
      <div class="mdl-mega-footer__drop-down-section">
        <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
        <h1 class="mdl-mega-footer__heading">Contact Us</h1>
        <ul class=" mdl-mega-footer__link-list">
          <li><a href=""><p class="white-text"><i class="fa fa-whatsapp" aria-hidden="true"></i> Message us on Whatsapp</p></a></li>
          <li><p class="white-text"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>Cell: +254786122096</p></li>
          <li><p class="white-text"><i class="fa fa-volume-control-phone" aria-hidden="true"></i>Help Center</p></li>
        </ul>
      </div>
      <div class="mdl-mega-footer__drop-down-section">
        <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
        <h1 class="mdl-mega-footer__heading">Let Us Help You:</h1>
        <ul class="mdl-mega-footer__link-list">
          <li><a href=""><p class="white-text">How To Shop On Lush</p></a></li>
          <li><a href=""><p class="white-text">Shipping and Delivery</p></a></li>
          <li><a href=""><p class="white-text">Track Your Order</p></a></li>
        </ul>
      </div>
  
      <div class="mdl-mega-footer__drop-down-section">
        <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
        <h1 class="mdl-mega-footer__heading">Info</h1>
        <ul class="mdl-mega-footer__link-list">
              <li>  <p class="white-text">Find us:<br>
   Business Centre <br>
  First Floor Room Number 102.<br>
                </p></li><br>
          <li><a href="">
            <b><p class="white-text">CLICK TO NAVIGATE</p></b></a></li>
        </ul>
      </div>
  
      <div class="mdl-mega-footer__drop-down-section">
        <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
        <h1 class="mdl-mega-footer__heading">Payment Methods</h1>
        <ul class="mdl-mega-footer__link-list">
          <li><a href=""><p class="white-text">MPESA</p></a></li>
          <li><a href=""><p class="white-text">CASH ON DELIVERY</p></a><br> </li>
        </ul>
      </div>
  
    </div>
  
    <div class="mdl-mega-footer__bottom-section float-center">
      <div class="mdl-logo "><center>&copy Lush Cosmetics 2019</center></div>
      <ul class="mdl-mega-footer__link-list">
      </ul>
    </div>
  
  </footer>
</html>
<?php
}
?>