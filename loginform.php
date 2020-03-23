<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

	
	<?php include('function.php'); ?>
		<?php
		//$_SESSION["loginstatus"]="";
		if(isset($_POST["sbmt"]))
		{
			$cn=makeconnection();
			$s="select typeofuser,pwd from users where Username='" . $_POST["Username_WheelOfFortuneBuzzer"] . "' and Binary Pwd='" . $_POST["Password_WheelOfFortuneBuzzer"] ."'";
			
			$q=mysqli_query($cn,$s);
			$r=mysqli_num_rows($q);
			$data=mysqli_fetch_array($q);
			mysqli_close($cn);
			if($r>0)
			{
				$_SESSION["Username_WheelOfFortuneBuzzer"]=$_POST["Username_WheelOfFortuneBuzzer"];
				$_SESSION["Usertype_WheelOfFortuneBuzzer"]=$data[0];
				$_SESSION["Password_WheelOfFortuneBuzzer"]=$data[1];
				$_SESSION["loginstatus_WheelOfFortuneBuzzer"]="yes";
				
				echo '<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action. </div>';
				header("location:index.php");
					
			}
			else
			{
				echo '<div class="alert alert-danger">  <strong>Error!</strong> Wrong username or password!</div>';
				$_POST["sbmt"]="";

			}
		}
		?>
	
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="Username_WheelOfFortuneBuzzer" class="sr-only">Email address</label>
        <input type="Username_WheelOfFortuneBuzzer" name="Username_WheelOfFortuneBuzzer" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <label for="Password_WheelOfFortuneBuzzer" class="sr-only">Password</label>
        <input type="Password_WheelOfFortuneBuzzer" name="Password_WheelOfFortuneBuzzer" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Log In" name="sbmt">
      </form>

    </div> <!-- /container -->
  </body>
</html>
