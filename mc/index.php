<?php die("");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Ajax Mailing List Sign Up System</title>
		<link type="text/css" rel="stylesheet" href="css/default.css" />
	</head>

	<body>
		<p id="description">Monthly news and updates plus discounts on all our products.</p>
		 <form id="signup" action="<?=$_SERVER['PHP_SELF']; ?>" method="get">
		  <fieldset>
			<legend>Join Our Mailing List</legend>
			  
			  <label for="email" id="address-label">Email Address
				<span id="response">
					<? require_once('inc/store-address.php'); if($_GET['submit']){ echo storeAddress(); } ?>
				  </span>
			  </label>
			  <input type="text" name="email" id="email" />
			  <input type="image" src="i/join.jpg" name="submit" value="Join" class="btn" alt="Join" />
			
			  <div id="no-spam">We'll never spam or give this address away</div>
		  </fieldset>
		</form>      
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/mailing-list.js"></script>

	</body>
</html>
