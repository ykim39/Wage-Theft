<!DOCTYPE html>
<?php
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
    include_once('top.php');
?>
<html lang="en">
<head>
  <title>Stop! Wage Theft</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<font face="Arial Black">
<nav class="navbar navbar-default">
  <div style = "background:#A9D0F5 !important" class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home.php"><font face="Arial Black">Stop! Wage Theft</a></font>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Home.php"><span style="font-size:1.0em" class="glyphicon glyphicon-home"></span><font face="Arial Black"> Home</a></li></font>
      <li><a href="enterhours.php"><span style="font-size:1.0em" class="glyphicon glyphicon-time"></span><font face="Arial Black"> Enter Hours</a></li></font>
      <li><a href="enterpaycheck.php"><span style="font-size:1.0em" class="glyphicon glyphicon-barcode"></span><font face="Arial Black"> Enter Paycheck</a></li></font>
      <li><a href="Makeclaim.php"><span style="font-size:1.0em" class="glyphicon glyphicon-bullhorn"></span><font face="Arial Black"> Make Claim</a></li></font>
      <li><a href="faq_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-question-sign"></span><font face="Arial Black"> FAQ</a></li></font>
	  <li><a href="contactus_in.php"><span style="font-size:1.0em" class="glyphicon glyphicon-phone-alt"></span><font face="Arial Black"> Contact Us</a></li></font>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>  Admin Dashboard <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Adminhome.php">Administrator Interface</a></li>
            <li><a href="EmployerUI.php">Employer Interface</a></li>
            <li><a href="NonProfUI.php">Non Profit Interface</a></li>
          </ul>
        </li>
    </ul>
		<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span><font face="Arial Black"> Logout</a></li></font>
	</ul>
  </div>
</nav>

  
<div class="container">
<br>
  <center>
  <h3 align="left"><span style="font-size:1.0em" class="glyphicon glyphicon-alert"></span><font size="6" color="red" face="Impact"> Stop! Wage Theft </font><span style="font-size:1.0em" class="glyphicon glyphicon-alert"></span></h3>
<br>

  <p><font size="5">This is the Administrator Dashboard (only viewable by admin)</font></p>

  </center>
</div>
<!----------------->
<!---List users--->
<!----------------->
<div class="container">
<div class="col-xs-12">
	<h2><?php echo "Users"; ?></h2>
</div>
</div>
<div class="container">
<div class="col-xs-12">
<table class="table table-hover">
<!-- Table about User -->
<tr style="background:#ECCEF5 !important">
	<td>Email</td>
</tr>
<tbody>
<?php
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT email FROM Users ORDER BY email;";
	
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "\n <tr>";
		echo "<td>" . $row['email'] . "</td>";
		echo "</tr>";
	}
?>
</table>

</div>
</div>
</body>
</html>
