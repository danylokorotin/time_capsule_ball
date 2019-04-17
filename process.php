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





<div id="ball">
  <div id="image">

	  <div class="videos">






</div>

	  <div id="theimage">

		 <img src="8ball.png" class = "myImage" alt="The Eight Ball" width="100%;" >
	</div></div>
	  <a href="index.php"><div id="reactor">
      <strong><font color="black">Back to main page</font></strong>
    </div></a>
	</div>

  </div>
<!--this is the image ^^^-->

	<div id="reactor2">

	</div>


<?php
/*if(isset($_POST['submit'])){
  $firstName = $_POST['first'];
  echo "First Name: " .$firstName . "<br />"
  $lastName = $_POST['last'];
  echo "Last Name: " .$lastName . "<br />"

}*/

if(isset($_POST["submit"]))
{
  if(empty($_POST["predict"])||empty($_POST["email"]))
  {
    $error = "<label class = 'text-danger'>Put thing</label>";
  }else
  {
    if (file_exists('storagePredictions.json'))
    {
      $current_data = file_get_contents('storagePredictions.json');
      $array_data = json_decode($current_data, true);
      $extra = array(
        'predict' => $_POST['predict'],
        'email' => $_POST['email'],
      );
      $array_data[] = $extra;
      $final_data = json_encode($array_data);
      if(file_put_contents('storagePredictions.json',$final_data))
      {
        $message = "<label class = 'text-success'>File Appended Success fully</p>";
      }
    }
    else
    {
      $error = 'JSON File not exists';
    }
  }
}

 ?>

</body>
</html>
