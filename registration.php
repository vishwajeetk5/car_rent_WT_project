<html>
<head>
<link rel="stylesheet" href="carrental.css">
<!-- <link rel="stylesheet" href="style.css"> -->
<title>Register</title>
<style>
.error {color: red;}
*{
  font-family: math;
}
.navbar{
  border-radius:20px;
  font-size: larger;
}
#frm{
  font-size:2rem;
}

input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
      
td{
  padding:5px;
  color:white;
  font-size:1.5rem;
  font-weight:3px;
}

</style>
</head>
<body>
<div class="navbar">
  <a href="carrental.html">Home</a>
  <a href="tarrif.php">Tarrifs</a>
  <a href="#">About us</a>
  <a href="contact.html">Contact us</a>
  <a href="login.html" class="right">Login</a>
  <a href="registration.php" class="right">Sign Up</a>
</div>

<?php

$cfname = $cdob = $cphone = $cgender = $cemail = $cuname = $cpwd = "";

if(isset($_POST['register'])){


if (empty($_POST["fname"])) {
$cfname = "Name is required";
}else {
$fname = $_POST['fname'];
}


$lname =  $_POST['lname'];

if (empty($_POST["dob"])) {
$cdob = "DOB is required";
}else {
$dob =  $_POST['dob'];
}

if (empty($_POST["phone"])) {
$cphone = "phone number is required";
}else {
$phone= $_POST['phone'];
}

if (empty($_POST["M"])) {
$cgender = "gender is required";
}else {
$gender =  $_POST['M'];
}

if (empty($_POST["email"])) {
$cemail = "email is required";
}else {
$email= $_POST['email'];
}

if (empty($_POST["uname"])) {
$cuname = "username is required";
}else {
$uname= $_POST['uname'];
}

if (empty($_POST["pwd"])) {
$cpwd = "password is required";
}else {
$pwd = $_POST['pwd'];
}

function validate_phone_number($phone)
{
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     $phone_to_check = str_replace("-", "", $filtered_phone_number);

     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
}

$city= $_POST['city'];
$country= $_POST['state'];
$state =$_POST['country'];
$con = mysqli_connect("localhost","root","","UserInformation");
if(!empty($fname) && !empty($dob) && !empty($phone) && !empty($gender) && !empty($email) && !empty($pwd) && validate_phone_number($phone) == true){
mysqli_select_db($con,"UserInformation");
$query="insert into registerhere values('$fname','$lname','$phone','$gender','$dob','$email','$uname','$pwd','$city','$country','$state')";
if(mysqli_query($con,$query))
{
  echo "Registered Succesfully";
header('location:login.html');
}
else{
echo "data not inserted".mysqli_error($con);

}
}
}
?>


<div class="bg-image"></div>

  </div>
  <div class="bg-text" id="frm">
    <center>
        <h3>Registration form</h3>
        <form method="post">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="fname"><span class="error">*<?php echo $cfname; ?></span></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="lname"></td>
                </tr>
                <tr>
                    <td>Date of birth:</td>
                    <td><input type="text" name="dob" placeholder="yyyy-mm-dd"><span class="error">*<?php echo $cdob; ?></span></td>
                </tr>
                <tr>
                    <td>Mobile Number:</td>
                    <td><input type="text" name="phone"><span class="error">*<?php echo $cphone; ?></span></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="M" value="M" default>Male
                        <input type="radio" name="M" value="FM">Female
                        <span class="error">*<?php echo $cgender; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" placeholder="abc@gmail.com"><span class="error">*<?php echo $cemail; ?></span></td>
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td><input type="text" name="uname"><span class="error">*<?php echo $cuname; ?></span></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pwd"><span class="error">*<?php echo $cpwd; ?></span></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city"></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><input type="text" name="state"></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><input type="text" name="country"></td>
                </tr>
            </table>
            <input type="submit" name="register" value="Submit">
        </form>
    </center>
</div>

</div>


</body>
</html>