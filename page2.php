<?php ?><html>
    <head><link rel="stylesheet" type="text/css" href="css/css3clock.css" />
    <style>
    body{
    background-image: url(assets/Background%20of%20office%20supplies.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        }
        .outer_face{
        margin:50px;
        }
        .b1{
            background-color: cornflowerblue;
            padding: 1px;
            border-radius: 60%;
            border-color: darkslategray;
            color: black;
            margin-top: -100px;
            position: fixed;
            font-size: 30px;
        }
        .b2{
            background-color:cornflowerblue;
            padding: 1px;
            border-radius: 60%;
            border-color: darkslategray;
            color: black;
            margin-top: 50px;
            position: fixed;
            font-size: 30px;
        }
.back{
  float:right;
  color: crimson;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
    margin-top:-60px;
  
        
}
#flip {
    padding: 5px;
    text-align: center;
    background-image: url(assets/b1.jpg);
    border: solid 2px black;
    width:310px;
    color: white;
}

#panel {
    padding: 5px;
    display: none;
    width: 310px;
    color: black;
    border: solid 2px black;
    background-image: url(assets/b1.jpg);}
        
        </style><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
    
});
    $(document).ready(function(){
        $(".b1").animate({left:'400px',padding:'25px'},"slow");
        $(".b2").animate({left:'400px',padding:'25px'},"slow");
        $(".b1").animate({padding:'55px'},"slow");
        $(".b2").animate({padding:'55px'},"slow");
        $(".b1").animate({padding:'35px'},"slow");
        $(".b2").animate({padding:'35px'},"slow");
    });

                               
                               
</script></head>
    
    <body>
    
<a class="back" href="index.html"><font size="5">H</font><font size="3">O</font><font size="10">M</font><font size="3">E</font></a>    
<div id="liveclock" class="outer_face">
<div class="marker oneseven"></div>
<div class="marker twoeight"></div>
<div class="marker fourten"></div>
<div class="marker fiveeleven"></div>

<div class="inner_face">
<div class="hand hour"></div>
<div class="hand minute"></div>
<div class="hand second"></div>
</div>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">

var $hands = $('#liveclock div.hand')

window.requestAnimationFrame = window.requestAnimationFrame
                               || window.mozRequestAnimationFrame
                               || window.webkitRequestAnimationFrame
                               || window.msRequestAnimationFrame
                               || function(f){setTimeout(f, 60)}


function updateclock(){
	var curdate = new Date()
	var hour_as_degree = ( curdate.getHours() + curdate.getMinutes()/60 ) / 12 * 360
	var minute_as_degree = curdate.getMinutes() / 60 * 360
	var second_as_degree = ( curdate.getSeconds() + curdate.getMilliseconds()/1000 ) /60 * 360
	$hands.filter('.hour').css({transform: 'rotate(' + hour_as_degree + 'deg)' })
	$hands.filter('.minute').css({transform: 'rotate(' + minute_as_degree + 'deg)' })
	$hands.filter('.second').css({transform: 'rotate(' + second_as_degree + 'deg)' })
	requestAnimationFrame(updateclock)
}

requestAnimationFrame(updateclock)
    
    
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
document.write("   <small><font color='000000' face='Arial'><b>"+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+"</b></font></small>")




</script>
    
        <form>
        <button class="b1" type="submit" formaction="sc.html">Calculator</button>
            <button class="b2" type="submit" formaction="tictactoe.html">Tic Tac Toe</button></form>
    </body>

</html>
<?php
$visit=0;
$fhand=fopen('visitor.txt','r');
if(!$fhand)
{
    echo"Error in opening file";
}
$visit=fread($fhand,20);
$visit++;
$myobj=(object)array();
$myobj->visitor=$visit;
$myJSON = json_encode($myobj);?>
<div id="flip">Click to know visitor number</div>
<div id="panel"><?php echo"<h1 align='center'>".$myJSON."</h1>";?></div><?php


fclose($fhand);
$fhand=fopen('visitor.txt','w');
fwrite($fhand,$visit);
fclose($fhand);
?>