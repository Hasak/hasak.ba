<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 16.05.2016.
 * Time: 20:36
 */
include ("db.php");
$f=$_POST['name'];
$l=$_POST['surname'];
$e=$_POST['email'];
$p=$_POST['phone'];
$m=$_POST['message'];
$ip=$_SERVER['REMOTE_ADDR'];
$sve=$_SERVER['HTTP_USER_AGENT'];
$time=date("Y-m-d");

$gdje="https://www.google.com/recaptcha/api/siteverify";
$sk="6Lf3uJ0UAAAAAHzNFLkrBDYgmIWWaVHMro-xxVVG";
$captcha=$_POST['captcha'];
$res=file_get_contents($gdje."?secret=".$sk."&response=".$captcha);
$res=json_decode($res);
if($res->success and $res->score>=0.2){
	mysqli_query($c,"insert into Mail (IP, Sve, Message, First, Last, Email, Phone, Time, Captcha) VALUES ('$ip','$sve','$m','$f','$l','$e','$p','$time','$res->score');");


	$to = "himzo@hasak.ba";
	$subject = "New portfolio message!";
	$txt = $m;
	$headers = "From: ".$f." ".$l." <".$e.">";
//ini_set("");

	if(!mail($to,$subject,$txt,$headers)) {
		echo 0;
	} else {
		echo 1;
	}
}
else echo 2;
