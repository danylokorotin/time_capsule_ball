<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap.css" >
<!--	this is what helps with formatting for the input boxes!!!! ^^^^^^-->
<link rel="stylesheet" type="text/css" href="style.css" >
<title>The Magic 8Ball</title>
<script src="jquery.js"></script>

	</head>

<body>
<div id="main">





<div id="ball" style="pointer-events: none;">
  <div id="image" style="pointer-events: none;" >
    	
	  <div class="videos" style="pointer-events: none;"> 
		 
<video id="video2" width="100%" data-setup="{}" onclick=" setNext(); RandomDisplay();" style="pointer-events:all;">
  <source src="8ball2.mp4" type="video/mp4">

</video>
	
	
	<div id="firstvid"  ><video id="video" width="100%" data-setup="{}" onclick="reacts2(); " style="pointer-events:all;">
  <source src="8ball1.mp4" type="video/mp4">

</video></div>
	  
	  <div id="theimage" style="pointer-events: none;">
		 <img src="8ball.png" class = "myImage" alt="The Eight Ball" width="100%;" style="pointer-events: none;">
	
	</div></div>
	  <div id="reactor">
    </div>
	</div>

  </div>
<!--this is the image ^^^-->

	<div id="reactor2">
	</div>
<!--this is the subtitle, text located in javascript at the bottom of the page^^^^^^^^^^^^^^^^^^^^^^^^^^^^-->

<!--<div id="input">
<div id="form1"><div class="input-group mb-3">
    <input type="text" class="form-control" id="myForm1" placeholder="What's the future like in 2030?" aria-label="Future" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" onclick="AddPrediction()" >Enter</button>
    </div></div></div>-->

		<div id="input">
		<div id="form1"><div class="input-group mb-3">
		  <form name = "register"  action = "process.php" method = "post" >

		        <?php
		  if(isset($error))
		  {
		    echo $error;
		  }
		         ?>

		<input type ="text" class="form-control" name = "predict" placeholder="What's the future like in 2030?"aria-label="Recipient's username" aria-describedby="basic-addon2" width="100%" maxlength="100"/>
		  
			  <input class="btn btn-outline-secondary" type = "submit" name ="submit" value="Enter"/></p>

		  <?php
		  if(isset($message))
		  {
		  echo $message;
		  }
		   ?>

			</div></div></div>
<!--
	<div id="form2"><div class="input-group mb-3">
    <input type="text" class="form-control" id="myForm2" placeholder="Enter Your Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" onclick="AddEmail()" >Enter</button>
    </div></div>
  </div>
</div>-->
<!--	these are the input forms^^^^^^^^^^^^^^^^^^^^^^-->


</div>





<script>

"use strict";
	var currentTime = new Date();
	var countDownDate = new Date("Apr 20, 2012 12:00:00").getTime();
	var countDownDate2 = new Date("Apr 20, 2010 12:00:00").getTime();
	var distance = countDownDate - currentTime;
	var distance2 = countDownDate2 - currentTime;
	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));


function reacts(){

	if (days2 > 0){

		document.getElementById('reactor').innerHTML=days + " days left.";
		document.getElementById('input').style.display = "block";
		document.getElementById('form1').style.display = "block";
		//if its before 2020
	}
	else if (days2 < 0 && days > 0){

		document.getElementById('reactor').innerHTML=days + " days left.";
		document.getElementById('form1').style.display = "none";
		
		//if its before 2030
	} else {

		document.getElementById('reactor').innerHTML="Unlocked!";
		document.getElementById('form1').style.display = "none";
		
		//if its past 2030
	}
	}
//	this is what we get when pressing on the image
reacts();
function reacts2(){
document.getElementById('video').play();
	setTimeout(reactsagain, 2100);
	function reactsagain(){
	if (days2 > 0){
		document.getElementById('reactor2').innerHTML = "The 8ball is a time capsule of people's predictions/hopes/fears for the future. What are you expecting for 2030? Submit a future that we might see in ten years! Submissions are anonymous and the 8ball is open for them until 4/20/20.";
		document.getElementById('input').style.display = "block";
		document.getElementById('form1').style.display = "block";
	//	document.getElementById('form2').style.display = "block";
		//if its before 2020
	}
	else if (days2 < 0 && days > 0){
		document.getElementById('reactor2').innerHTML = "On April 20, 2030, this 8ball will be unlocked to reveal strangers' predictions from 10 years prior.";
		document.getElementById('form1').style.display = "none";
//		document.getElementById('form2').style.display = "block";
		//if its before 2030
	}

	else {
		document.getElementById('reactor2').innerHTML = "After 10 long years of protecting the secrets of humanity, the 8ball has been unlocked. Press on the ball to get a random prediction from a wondering soul from 2019-2020.";
			document.getElementById('form1').style.display = "none";
		//document.getElementById('form2').style.display = "block";
		//if its past 2030
		}
document.getElementById('video').style.pointerEvents = "none";
	}}

	
//this is what controls the display of the subtitle and the input boxes



var predictions = [];

var charLimit = 20;


function AddPrediction() { //This adds in the typed submission to our array of predictions
  var testPre = document.getElementById("myForm1").value;
  if(testPre.length > 0 && testPre.length < charLimit){ //Character Limit check
    predictions.push(testPre); //Pushes string into the array for access by 8-ball

    document.getElementById("myForm1").value='';

  }else{ //If it exceeds limit, denies the entry into the array

    document.getElementById("demo").innerHTML = "denied";
  }

}
//i didn't modify this too much
function AddEmail() { //This adds in the typed submission to our array of predictions
  var testPre = document.getElementById("myForm2").value;
  if(testPre.length > 0 && testPre.length < charLimit){ //Character Limit check
    predictions.push(testPre); //Pushes string into the array for access by 8-ball
    document.getElementById("myForm2").value='';
  }else{ //If it exceeds limit, denies the entry into the array
    document.getElementById("demo").innerHTML = "denied";
  }

}

function RandomDisplay(){ //This function displays a random string from the array
/*document.getElementById("reactor2").innerHTML = ' ';
setTimeout(rand, 2400);
	function rand(){
  var randNumber = Math.floor(Math.random() * predictions.length);

  document.getElementById("reactor2").innerHTML = predictions[randNumber];*/
	if(days < 0){

	$.getJSON('storagePredictions.json',function(data){
    /*console.log(data);
    var testing = data.length;
    var maybe = data[0].predict;
    console.log(maybe);*/
		document.getElementById("reactor2").innerHTML = ' ';
		setTimeout(rand, 2100);
		function rand(){
    for(var i=0;i<data.length;i++){
      var thisPrediction = data[i].predict;
      predictions[i] = thisPrediction;
      console.log(predictions[i]);
    }
    var randNumber = Math.floor(Math.random() * predictions.length);
    document.getElementById("reactor2").innerHTML = predictions[randNumber];
	}
		});
}

}
var video2 = document.getElementById('video2');

var x = document.getElementById('firstvid');



function setNext() {
	if(days < 0){


	x.style.display= "none";
	video2.currentTime = 0;
    video2.play();

	}


 }







</script>
</body>
</html>
