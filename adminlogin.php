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
$uname = $_POST['uname'];
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
$sql = "SELECT * from users";
$result = $conn->query($sql);
if ($uname == "admin" and $psw == "ise@123")
{
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        array_push($usersArray, $row);
        if(count($usersArray))
        {
         createXMLfile($usersArray);

        }
    }
}
header('Location:user.xml');
exit(0);
}
else{?>
    <h1><img class="image" src=assets/saddog.jpg><br>
        <br><?php
        echo "Wrong Username or Password";?></h1><a class="message" href="index.html">Click here to try again</a><?php
    }

function createXMLfile($usersArray){
  
   $filePath = 'user.xml';

   $dom     = new DOMDocument('1.0', 'utf-8'); 

   $root      = $dom->createElement('usersdata'); 

   for($i=0; $i<count($usersArray); $i++){
     
     $firstname        =  $usersArray[$i]['fname'];  

     $lastname    =  $usersArray[$i]['lname']; 

     $usn     =  $usersArray[$i]['usn']; 

     $email      =  $usersArray[$i]['email']; 

     $password  =  $usersArray[$i]['password'];	

     $user = $dom->createElement('users');

     $firstname1=$dom->createElement('firstname', $firstname);

     $user->appendChild($firstname1); 

     $lastname1   = $dom->createElement('lastname', $lastname); 

     $user->appendChild($lastname1); 

     $usn1    = $dom->createElement('usn', $usn); 

     $user->appendChild($usn1); 

     $email1     = $dom->createElement('email', $email); 

     $user->appendChild($email1); 
     
     $password1 = $dom->createElement('password', $password); 

     $user->appendChild($password1);
 
     $root->appendChild($user);

   }

   $dom->appendChild($root); 

   $dom->save($filePath); 

 } 

?>
</html>