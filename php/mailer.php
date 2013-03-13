<?php
require("../PHPMailer_5.2.2/class.phpmailer.php");
require("../chromephp/ChromePhp.php");
$mail = new PHPMailer();
ChromePhp::log($_FILES);
foreach ($_POST as $key => $value)
{
    ChromePhp::log($key, $value);
}
$pairs = explode("&", $_POST["data"]);
ChromePhp::log($pairs);

# Retrieve values
foreach($pairs as &$value)
{
    $tmpArr = explode("=", $value);
    $value = $tmpArr[1];
}
ChromePhp::log($pairs);

$body = "<b>Name:</b> {$pairs[0]}\r\n<br><b>Email:</b> {$pairs[1]}\r\n"
        ."<br><b>Website:</b> {$pairs[2]}\r\n<br><b>Twitter:</b> {$pairs[3]}\r\n"
        ."<br><b>LinkedIn:</b> {$pairs[4]}\r\n<br><b>Tumblr:</b> {$pairs[5]}\r\n"
        ."<br><b>What got you interested in IT/Dev?</b>\n<br>{$pairs[6]}\r\n"
        ."<br><b>What kind of dev work do you do?</b>\n<br>{$pairs[7]}\r\n"
        ."<b><br>What are your fav lang to dev in?</b>\n<br>{$pairs[8]}\r\n"
        ."<br><b>What would you like to see more of in the BFC community?</b>\n"
        ."<br>{$pairs[9]}\r\n<br>";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "blackfemalecoders.org"; // SMTP serv$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "blackfemalecoders@gmail.com";  // GMAIL username
$mail->Password   = "bfcsite88";            // GMAIL password

$mail->SetFrom('bfc@blackfemalecoders.org', 'BlackFemaleCoders');

$mail->AddReplyTo("bfc@blackfemalecoders.org","BlackFemaleCoders");

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);
//if($_FILES['uploadedPhoto']['error'] == UPLOAD_ERR_OK)
//if(isset($_FILES['file-0']['tmp_name']))
//{$mail->MsgHTML($body);}
ChromePhp::log($_FILES['file-0']);
if(isset($_FILES['file-0']) &&
	$_FILES['file-0']['error'] == UPLOAD_ERR_OK)
{
	$mail->AddAttachment($_FILES['file-0']['tmp_name'], $_FILES['file-0']['name']);
}

$address = "blackfemalecoders@gmail.com";
$mail->AddAddress($address, "Daphne");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  include("../profiles/submit.html");
}

?>
