<html>
    <style>
        .image{
            width: 600px;
            height: 500px;
            margin-top: 0px;
            margin-left: -100px;
            
        }
        .message{
            font-size: 25pt;
            margin-left: 700px;
        
        }
        h1{
            margin-left: 600px;
            align-items: center;
            color: crimson;
        }
        .image1
        {
            margin-left: 500px;
            margin-top: 0px;
            width: 600px;
            height: 500px;
        }
        
        
    
    </style>
    <body>
    <?php
 $host="localhost";
 $username="root";
 $password="";
 $db="webusers";
$conn = new mysqli($host, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  

 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $usn=$_POST['usn'];
 $email=$_POST['email'];
 $psw=$_POST['psw'];
 $pswr=$_POST['psw-repeat'];
 if($psw!=$pswr)
 {
     ?>
     
     <h1><img class="image" src=assets/saddog.jpg><br>
        <br><?php
        echo "Passwords don't match";?></h1><a class="message" href="index.html">Try again</a><?php
 }

 else{   
    
$sql="select * from users where fname='$fname'and email='$email' and password='$psw'";
$get_user=mysqli_query($conn,$sql);
$r=mysqli_num_rows($get_user);
 if($r>0)
 {?><img class="image1" src="cat.gif" ><h1><?php
     echo "Details Are Already Submitted";?></h1>
  <a  class="message" href="./index.html">Click here to login</a><?php   
 }
 else
 {
  mysqli_query($conn,"insert into users values('$fname','$lname','$usn','$email','$psw')");?>
    <img class="image1" src="cat.gif">
    <h1><?php echo" Thank You for Registering!.."; ?> </h1>
     <a class="message" href="./index.html">Click here to continue</a>
  <?php
 }
 }

?>
