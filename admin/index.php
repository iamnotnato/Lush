
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>LUSH || USERS </title>
    <link rel="shortcut icon" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="../css/uikit.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/material.css" />

    <link rel="stylesheet" href="../css/style.css">

 
</head>
  
<body>

   <div class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light"
    data-src="images/icon.png" href="home" uk-img>
</div>

<div class="uk-position-center container" id="container">
       
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
                    <h1>Welcome Back!</h1>
                    <p>
                        To keep connected with us 
                        <br>please login with your personal info
                    </p>
                    <button class="ghost" id="signIn">Sign In</button>
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
    	$query = mysqli_query($conn, "SELECT * FROM admin WHERE user='".$user."' and pass='".$pass."'");
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
    			header("Location: home");
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

  <script type="text/javascript" src="../js/uikit.min.js"></script>
<script type="text/javascript" src="../js/uikit-icons.js"></script>
<script src="../js/index.js"></script>
    <script type="text/javascript" src="../js/material.min.js"></script>

</body>

</html>
