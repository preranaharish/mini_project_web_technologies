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
        
        
    
    </style>
    <body>
    
    
    </body><?php
$email = $_POST['email'];
$psw = $_POST['psw'];
$message = "";
$servername = "localhost";
$username = "root";
$password = "";
$db = "webusers";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$usersArray = array();
$sql = "SELECT * from users where email='$email' and password='$psw'";
$result = $conn->query($sql);
    if ($result->num_rows > 0){
        header( "Location: page2.php");
        exit(0);
    }
    else{?>
    <h1><img class="image" src=assets/saddog.jpg><br>
        <br><?php
        echo "Wrong Username or Password";?></h1><a class="message" href="index.html">Click here to try again</a><?php
    }
?>
</html>
