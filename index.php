<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>LUSH || USERS </title>
    <link rel="shortcut icon" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />

 
</head>
  
<body>

   <div class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light"
    data-src="images/icon.png" href="home" uk-img>
</div>

<div class="uk-position-center container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="post">
                <h1>Create Account</h1>
                <input name="user" type="text" placeholder="Name" />
                <input name="pass" type="password" placeholder="Password" />
                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>

        <?php
if(isset($_POST['submit'])){
  if(!empty($_POST['user']) && !empty($_POST['pass'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
    $db = mysqli_select_db($conn, 'lush-cosmetics') or die("DB Error");

    $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."'");
    $numrows = mysqli_num_rows($query);
    if($numrows  == 0) {
      $sql = "INSERT INTO userpass(user,pass) VALUES('$user','$pass')";
      $result = mysqli_query($conn, $sql);
      if($result){
        ?>
      <script>
      alert('Your account has been successfully created. Proceed to Login');
    </script>
    <?php
    echo '<script>window.location="login.php"</script>';
      }
      else{
        echo "Failed to create account";
      }
    }
    else{
      echo "That username already exists. Please choose another";
    }
  }
  else{
    ?>
    <script>
      alert('Fields cannot be left blank');
    </script>
    <?php
  }
}
?> 
        <div class="form-container sign-in-container">
        <form action="" method="post">
                <h3>Sign in</h3>
        
                <input name="user" type="user" placeholder="Username" />
                <input name="pass" type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2>Welcome Back!</h2>
                    <p>
                        To keep connected with us 
                        <br>please login with your personal info
                    </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello!</h1>
                    <p>Enter your personal details 
                        <br>and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

<?php
if(isset($_POST["login"])){
	if(!empty($_POST['user']) && !empty($_POST['pass'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
    	$db = mysqli_select_db($conn, 'lush-cosmetics') or die("DB Error");
    	$query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."' and pass='".$pass."'");
    	$numrows = mysqli_num_rows($query);
    	if($numrows !=0)
    	{
    		while($row = mysqli_fetch_assoc($query))
    		{
    			$dbusername = $row['user'];
    			$dbpassword = $row['pass'];
    		}
    		if($user == $dbusername && $pass == $dbpassword)
    		{
    			session_start();
    			$_SESSION['sess_user']=$user;
    			header("Location: shopping-index.php");
    		}
    	}
    	else
    	{
            echo "Incorrect Login Details";
  
    	}
    }
    else
    {
    	echo "All fields required";
    }
}
?>

  <script type="text/javascript" src="js/uikit.min.js"></script>
<script type="text/javascript" src="js/uikit-icons.js"></script>
<script src="js/index.js"></script>

</body>

</html>
