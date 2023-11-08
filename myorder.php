<!DOCTYPE html>
<?php
	include "checksession.php";

$sql = "select fname from registerhere where uname='$usercheck'";
$link = mysqli_connect("localhost","root","","UserInformation");
$r=mysqli_query($link,$sql);
$rs = mysqli_fetch_array($r);
    	
	?>
<html>
<head>
<link rel="stylesheet" href="carrental.css">
<title>Myorder</title>
</head>
<body>
<div class="navbar">
  <a href="carrental.php">Home</a>
  <a href="tarrif.php">Tarrifs</a>
  <a href="#">About us</a>
  <a href="contact.html">Contact us</a>
  
  <a href="logout.php" class="right">logout</a>
  <a href="#" class="right">
  <?php
     echo "Hello! ".$rs['fname'];	
	?>
	</a>
  <a href="myorder.php" class="right">mybookings</a>
  <a href="rent.php" class="right">Rent</a>
  
</div>

<div class="bg-image"></div>


<div class="bg-text">
 
<div class="header">
<center>


<?php
$sql = "SELECT cc, dc, doi, dor,distance FROM request WHERE uname='$usercheck'";
$link = mysqli_connect("localhost", "root", "", "UserInformation");
$r = mysqli_query($link, $sql);

if ($r) {
    while ($rs = mysqli_fetch_array($r)) {
        echo "Starting point : " . $rs['cc'] . "<br>";
        echo "Destination point : " . $rs['dc'] . "<br>";
        echo "Starting date : " . $rs['doi'] . "<br>";
        echo "Ending point : " . $rs['dor'] . "<br>";
        $distance = $rs['distance'];
       
        $baseRate = 100; 
        $extraRatePerKM = 5; 
        
        $cost = $baseRate;

        if ($distance > 50) {
            $extraDistance = $distance - 50;
            $cost += $extraDistance * $extraRatePerKM;
        }
        echo "Distance: " . $distance . " KMs<br>";
        echo "Cost of Trip: " . $cost . " INR<br>";

        echo "<br>";
    }
} else {
    echo "Error executing SQL query: " . mysqli_error($link);
}
?>

</center>
</div>

   
  
  </div>
</div>



</body>
</html>



