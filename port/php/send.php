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
$time=time();

mysqli_query($c,"insert into Mail (IP, Sve, Message, First, Last, Email, Phone, Time) VALUES ('$ip','$sve','$m','$f','$l','$e','$p','$time');");


$to = "himzo@hasak.ba";
$subject = "New portfolio message!";
$txt = $m;
$headers = "From: ".$f." ".$l." <".$e.">";
//ini_set("");

if(!mail($to,$subject,$txt,$headers)) {
    echo 'Message could not be sent.';
} else {
    echo 1;
}