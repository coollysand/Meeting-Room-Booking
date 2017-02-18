<html>
<head>
     <title>Booking Already</title>
</head>
<body>

<center>Booking Already</center>


<?php

echo $_POST["name"]."<br>";

echo $_POST["lastname"]."<br>"; 
echo $_POST["a"]."<br>"; 
echo $_POST["b"]."<br>"; 
echo $_POST["c"]."<br>"; 
echo $_POST["d"]."<br>"; 

echo "<hr>";
?>


<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "coolly.sand@gmail.com";
    $email_subject = "Booking Room";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['lastname']) ||
        !isset($_POST['nw']) ||
        !isset($_POST['tel']) ||
        !isset($_POST['email']) ||

        !isset($_POST['project']) ||
        !isset($_POST['numpeople']) ||
        !isset($_POST['sdate']) ||
        !isset($_POST['stime']) ||
        !isset($_POST['ldate']) ||
        !isset($_POST['ltime']) ||
        !isset($_POST['numdate']))

{
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['name']; // required
    $last_name = $_POST['lastname']; // required
    $nw = $_POST['nw']; // not required
    $telephone = $_POST['tel']; // not required
    $email_from = $_POST['email']; // required
    $project = $_POST['project']; // required
    $numpeople = $_POST['numpeople'];
    $sdate = $_POST['sdate'];
    $stime = $_POST['stime'];
    $ldate = $_POST['ldate'];
    $ltime= $_POST['ltime'];
    $numdate = $_POST['numdate'];
    $moreroom = $_POST['moreroom'];
    $other = $_POST['other'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];


     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($project) < 2) {
    $error_message .= 'The Project you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Name of Project: ".clean_string($nw)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Project Name: ".clean_string($project)."\n";
     $email_message .= "Number of People: ".clean_string($numpeople)."\n"; 
     $email_message .= "Start Date: ".clean_string($sdate)."\n";
     $email_message .= "Start Time: ".clean_string($stime)."\n";
     $email_message .= "Last Date: ".clean_string($ldate)."\n";
     $email_message .= "Last Time: ".clean_string($ltime)."\n";
     $email_message .= "Number of Date: ".clean_string($numdate)."\n";
     $email_message .= "Booking More Room: ".clean_string($moreroom)."\n";
     $email_message .= "Comments: ".clean_string($other)."\n";
     $email_message .= "Room1: ".clean_string($a)."\n";
     $email_message .= "Room2: ".clean_string($b)."\n";
     $email_message .= "Room3: ".clean_string($c)."\n";
     $email_message .= "Room4: ".clean_string($d)."\n";
     $email_message .= "Accept or Cancle link>> http://27.254.38.19/~booking6/accept.php: "."\n";

     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
}
die();
?>
</body>
</html>