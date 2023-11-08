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
<link rel="stylesheet" href="style.css">
<title>Rent a car</title>
</head>
<body>
<div class="navbar">
  <a href="carrental.html">Home</a>
  <a href="tarrif.php">Tarrifs</a>
  <a href="#">About us</a>
  <a href="contact.html">Contact us</a>
  
  <a href="logout.php" class="right">logout</a>
  <a href="#" class="right">
  <?php
     echo "Hello! ".$rs['fname'];	
	?>
	</a>
  <a href="myorder.php" class="right">mybookings

	</a>
  
</div>
<?php


$cmob = $ccc = $cdc = $cdoi = $cdor = $cdistance = $ccarid= $cdln ="";

if(isset($_POST['sub'])){


if (empty($_POST["mob"])) {
$cfname = "Mobile number is required";
}else {
$fname = $_POST['mob'];
}

if (empty($_POST["cc"])) {
$ccc = "statrting point is required";
}else {
$fcc = $_POST['cc'];
}


if (empty($_POST["dc"])) {
$cdc = "destination is required";
}else {
$dc = $_POST['dc'];
}

if (empty($_POST["doi"])) {
$cdoi = "when you want to start your journey?";
}else {
$doi = $_POST['doi'];
}

if (empty($_POST["dor"])) {
$cdor = "when your journey will end?";
}else {
$dor = $_POST['dor'];
}

if (empty($_POST["distance"])) {
$cdistance = "pls mention a distance";
}else {
$dist = $_POST['distance'];
}

if (empty($_POST["carid"])) {
$cfcarid = "which car you want?";
}else {
$carid = $_POST['carid'];
}

if (empty($_POST["dln"])) {
$cdln = "fill this field";
}else {
$dln = $_POST['dln'];
}

function validate_phone_number($no)
{
     $filtered_phone_number = filter_var($no, FILTER_SANITIZE_NUMBER_INT);
  
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
 
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
}




$username=$usercheck;
$no=$_POST['no'];
$cc=$_POST['cc'];
$dc=$_POST['dc'];
$doi=$_POST['doi'];
$dor=$_POST['dor'];
$distance=$_POST['distance'];
$carid=$_POST['carid'];
$dln=$_POST['dln'];
if(!empty($no) && !empty($cc) && !empty($dc) && !empty($doi) && !empty($dor) && !empty($distance) && !empty($carid) && !empty($dln) && (validate_phone_number($no) == true) ){
$sql = "INSERT INTO request(uname,no,cc,dc,doi,dor,distance,carid,dln) values('$username','$no','$cc','$dc','$doi','$dor','$distance','$carid','$dln')";
mysqli_query($link,$sql);
header("location:myorder.php");
}
}
?>

<div class="bg-image"></div>

<div class="bg-text">

<form method="post">
        <label for="no">Mobile number:</label><span class="error">*<?php $no=0; echo $no;?></span><br>
        <input type="number" name="no" value="" size="10">
        <label for="cc">Current city:</label><span class="error">*<?php echo $ccc; ?></span><br>
        <input type="text" name="cc">
        <label for="dc">Destination city:</label><span class="error">*<?php echo $cdc; ?></span><br>
        <input type="text" name="dc">
        <label for="doi">Date of issue:</label><span class="error">*<?php echo $cdoi; ?></span>
        <input type="date" name="doi"><br>
        <label for="dor">Date of return:</label><span class="error">*<?php echo $cdor; ?></span>
        <input type="date" name="dor"><br>
        <label for="distance">Distance:</label><span class="error">*<?php echo $cdistance; ?></span><br>
        <input type="number" name="distance">(approx. in KMs)

        <label for="carid">Car:</label>
        <select name="carid"><span class="error">*<?php echo $ccarid; ?></span>
            <option value="1">Bolero</option>
            <option value = "2">Scorpio</option>
               <option value = "3">Innova</option>
               <option value = "4">Indica</option>
               <option value = "5">Baleno</option>
               <option value = "6">Alto 800</option>
        </select><br>

        <label for="sprq">Any special requests:</label>
        <textarea name="sprq" rows="1" cols="20"></textarea><br>

        <label for="dln">Driver license number:</label><span class="error">*<?php echo $cdln; ?></span><br>
        <input type="text" name="dln" value="" size="15">

        <input type="submit" value="SUBMIT REQUEST" name="sub">
    </form>

 </div>
</div>

    

</body>
</html>