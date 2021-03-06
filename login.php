<?php
	include_once('config.php');
	include_once('dbutils.php');
?>

<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.

if (isset($_POST['submit'])) {
	
	
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	
	// check to make sure we have an email
	if (!$email) {
		header("Location: login.php");
	}
	
	if (!$password) {
		header("Location: login.php");
	}

	// check if user is in the database
		// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT email, hashedPass FROM Users WHERE email='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	
	// check if the email is there
	if (nTuples($result) > 0) {
		$row = nextTuple($result);
		
		if ($row['hashedPass'] == crypt($password, $row['hashedPass'])) {
			// Password is correct
			if (session_start()) {
				$_SESSION['email'] = $email;
				header('Location: Home_in.php');
			} else {
				punt("Unable to create session");
			}
		} else {
			// Password is not correct
			punt('The password you entered is incorrect');
		}
	} else {
		punt("The email '$email' is not in our database");
	}	
	
}

?>


<html>
<head>
	<title>
		Login
	</title>

	<!-- Following three lines are necessary for running Bootstrap -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
</head>

<body>
<nav class="navbar navbar-default">
  <div style = "background:#A9D0F5 !important" class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home.php"><font face="Arial Black">Stop! Wage Theft</a></font>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Home.php"><span style="font-size:1.0em" class="glyphicon glyphicon-home"></span><font face="Arial Black"> Home</a></li></font>
	  <li><a href="jobform.php"><span style="font-size:1.0em" class="glyphicon glyphicon-briefcase"></span><font face="Arial Black"> Enter Job</a></li></font>
      <li><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
      <li><a href="enterpaycheck.php"><span style="font-size:1.0em" class="glyphicon glyphicon-barcode"></span><font face="Arial Black"> Enter Paycheck</a></li></font>
      <li><a href="Makeclaim.php"><span style="font-size:1.0em" class="glyphicon glyphicon-bullhorn"></span><font face="Arial Black"> Make Claim</a></li></font>
      <li><a href="faq.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
	  <li><a href="contactus.php"><span style="font-size:1.0em" class="glyphicon glyphicon-phone-alt"></span><font face="Arial Black"> Contact Us</a></li></font>
    </ul>
  </div>
</nav>



<div class="container">
<font face="arial black">
<!-- Page header -->
<div class="row">
<div class="col-xs-12">
<div class="page-header">
	<h1>Login</h1>
</div>
</div>
</div>


<!-- Form to enter club teams -->
<div class="row">
<div class="col-xs-12">


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="col-md-6">
<div class="form-group">
<font face="Arial Black" size="4.2px">
	<label for="email">Email</label>
	<input type="email" class="form-control" name="email"/>
</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password"/>
</div>

	<p align="right"><button type="submit" class="btn btn-default" name="submit">Login</button></p>


</form>
</div>

<div class="col-md-6">
<div class="form-group">

	<span class="glyphicon glyphicon-alert"></span><font size="5.0em" color="red">  WAIT!</font><br><br>
	New to <font color="red"> Stop! Wage Theft</font>?<br>
	Please Create your free account for <font color="red">Stop! Wage Theft.</font> <br><br><p></p>
	 <p align="right"><button onclick="location.href='inputuser.php'" class="btn btn-default">Sign up</button></p>

</div>
</div>


</div> <!-- closing bootstrap container -->
</body>
</html>
