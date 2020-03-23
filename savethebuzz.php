<?php if(!isset($_SESSION)) { session_start(); } ?>
<?php include('function.php'); ?>
  <?php
	try {
		$cn=makeconnection();
		$s="insert into buzzers (Username) 
		values ('" . strtolower($_SESSION["Username_WheelOfFortuneBuzzer"]) ."')";
		 		
		$mysqliQueryErrorSuccess='';
		
		if (mysqli_query($cn,$s)) {
			$mysqliQueryErrorSuccess = "Success buzz";
		} else {
			$mysqliQueryErrorSuccess = "Error: " . $s . "<br>" . mysqli_error($cn);
		}
		
		//mysqli_query($cn,$s); //sega go staviv da se povikuva gore vo if-ot, za da znam dali e uspesen insertot
		mysqli_close($cn);
		
		if (strpos($mysqliQueryErrorSuccess, 'Success buzz') !== false) {
			echo 'Successful buzzing ✓';
		} elseif (strpos(strtolower($mysqliQueryErrorSuccess), 'duplicate') !== false) {
			echo 'You already buzzed.';
		} else {
			echo $mysqliQueryErrorSuccess;
		}
		
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
		
	}  
?>