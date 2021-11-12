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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>LUSH |HOME|</title>
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
<div uk-slideshow="animation:push; autoplay-interval:3000; autoplay:true; finite:true;">

    <div class="uk-position-relative uk-visible-toggle uk-dark">

        <ul class="uk-slideshow-items">
            <li>
                <img src="images/header.png" alt="" uk-cover>
                <div class="uk-overlay uk-text-secondary uk-dark uk-position-center">
       <button class="uk-button uk-button-secondary">FOUNDATIONS</button>
        <button class="uk-button uk-button-secondary">KES 2000</button>
    </div>
            </li>
            <li>
                <img src="images/header2.png" alt="" uk-cover>
                 <div class="uk-overlay uk-text-secondary uk-dark uk-position-center">
       <button class="uk-button uk-button-secondary">EYE PALLETE</button>
        <button class="uk-button uk-button-secondary">KES 2000</button>
    </div>
            </li>
            <li>
                <img src="images/header3.png" alt="" uk-cover>
                 <div class="uk-overlay uk-text-primary uk-dark uk-position-center">
        <button class="uk-button uk-button-secondary">LIPKITS</button>
         <button class="uk-button uk-button-secondary">KES 2500</button>
    </div>
            </li>
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

 <div class="uk-position-bottom-center uk-position-small">
        <ul class="uk-thumbnav">
            <li uk-slideshow-item="0"><a href="#"><img src="images/header.png" width="100" alt=""></a></li>
            <li uk-slideshow-item="1"><a href="#"><img src="images/header2.png" width="100" alt=""></a></li>
            <li uk-slideshow-item="2"><a href="#"><img src="images/header3.png" width="100" alt=""></a></li>
        </ul>
    </div>
    </div>

    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>

</div>
<hr class="uk-divider-icon">
   <center><h6>SHOP</h6></center>
   <hr class="uk-divider-icon">
   <div style="clear:both"></div>
<div class="table-responsive">
  <table class="uk-table">
    <caption class="uk-text-center">ORDER DETAILS</caption>
    <center>  <p class="uk-comment-meta uk-margin-remove-top">Kindly Place One Order At A Time</p></center>
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
      <td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?> "><span class="text-danger">X</span></a>
      </td>
    </tr>
    <?php
    $total = $total + ($values["item_quantity"] * $values["product_price"]);
  }
  ?>
  <tr>
    <td colspan="3" align="right">Total </td>
    <td align="right">KES <?php echo number_format($total, 2); ?></td>
    <td></td>
  </tr>
  <?php
}
?>
</table>
   <center><a class="uk-button uk-button-default uk-button-small" href="shopping-order.php">
   PLACE ORDER</a></center>
<br>
</div>
</div>

<hr class="uk-divider-icon">
<center><h6>FOUNDATIONS</h6></center>
<hr class="uk-divider-icon">
<div class="uk-child-width-1-4@s uk-grid-small uk-text-center" uk-grid>
  <?php
  $query = "SELECT * FROM foundations ORDER BY id ASC";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
    while ($row = mysqli_fetch_array($result)) {
      ?>
  
    <div class="uk-tile uk-tile-default uk-padding-small">
      <form  method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
        <img src="<?php echo $row["image"]; ?>" class="img-responsive">
        <h5 class="text-info"><?php echo $row["p_name"]; ?> </h5>
        <h5 class="text-info"><?php echo $row["description"]; ?> </h5>
        <h5 text class="danger">KES <?php echo $row["price"]; ?> </h5>
        <div class="uk-margin">
        <input type="text" name="quantity" class=" uk-input uk-form-width-medium uk-form-small form-control" value="1" placeholder="Small">
      </div>
        <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
        <input type="submit" name="add" style="margin-top: 5px;" class="uk-button uk-button-default uk-button-small" value="Add To Cart">
</form>
</div>
  <?php
}
}
?>
</div>

<hr class="uk-divider-icon">
<center><h6>LIP KITS</h6></center>
<hr class="uk-divider-icon">
<div class="uk-child-width-1-4@s uk-grid-small uk-text-center" uk-grid>
  <?php
  $query = "SELECT * FROM lip_kits ORDER BY id ASC";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
    while ($row = mysqli_fetch_array($result)) {
      ?>
  
    <div class="uk-tile uk-tile-default uk-padding-small">
      <form  method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
        <img src="<?php echo $row["image"]; ?>" class="img-responsive">
        <h5 class="text-info"><?php echo $row["p_name"]; ?> </h5>
        <h5 class="text-info"><?php echo $row["description"]; ?> </h5>
        <h5 text class="danger">KES <?php echo $row["price"]; ?> </h5>
        <div class="uk-margin">
        <input type="text" name="quantity" class=" uk-input uk-form-width-medium uk-form-small form-control" value="1" placeholder="Small">
      </div>
        <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
        <input type="submit" name="add" style="margin-top: 5px;" class="uk-button uk-button-default uk-button-small" value="Add To Cart">
</form>
</div>
  <?php
}
}
?>
</div>

<hr class="uk-divider-icon">
<center><h6>EYE PALLETE</h6></center>
<hr class="uk-divider-icon">
<div class="uk-child-width-1-4@s uk-grid-small uk-text-center" uk-grid>
  <?php
  $query = "SELECT * FROM eye_palette ORDER BY id ASC";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
    while ($row = mysqli_fetch_array($result)) {
      ?>
  
    <div class="uk-tile uk-tile-default uk-padding-small">
      <form  method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
        <img src="<?php echo $row["image"]; ?>" class="img-responsive">
        <h5 class="text-info"><?php echo $row["p_name"]; ?> </h5>
        <h5 class="text-info"><?php echo $row["description"]; ?> </h5>
        <h5 text class="danger">KES <?php echo $row["price"]; ?> </h5>
        <div class="uk-margin">
        <input type="text" name="quantity" class=" uk-input uk-form-width-medium uk-form-small form-control" value="1" placeholder="Small">
      </div>
        <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
        <input type="submit" name="add" style="margin-top: 5px;" class="uk-button uk-button-default uk-button-small" value="Add To Cart">
</form>
</div>
  <?php
}
}
?>
</div>

<hr class="uk-divider-icon">
<center><h6>SETTING SPRAYS</h6></center>
<hr class="uk-divider-icon">
<div class="uk-child-width-1-4@s uk-grid-small uk-text-center" uk-grid>
  <?php
  $query = "SELECT * FROM setting_sprays ORDER BY id ASC";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
    while ($row = mysqli_fetch_array($result)) {
      ?>
  
    <div class="uk-tile uk-tile-default uk-padding-small">
      <form  method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
        <img src="<?php echo $row["image"]; ?>" class="img-responsive">
        <h5 class="text-info"><?php echo $row["p_name"]; ?> </h5>
        <h5 class="text-info"><?php echo $row["description"]; ?> </h5>
        <h5 text class="danger">KES <?php echo $row["price"]; ?> </h5>
        <div class="uk-margin">
        <input type="text" name="quantity" class=" uk-input uk-form-width-medium uk-form-small form-control" value="1" placeholder="Small">
      </div>
        <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
        <input type="submit" name="add" style="margin-top: 5px;" class="uk-button uk-button-default uk-button-small" value="Add To Cart">
</form>
</div>
  <?php
}
}
?>
</div>
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