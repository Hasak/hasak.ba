<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 16.05.2016.
 * Time: 19:31
 */


  $c=mysqli_connect("localhost","hasakba_port","port123","hasakba_port");
if(mysqli_connect_errno()){
    die("Can't connect to database\nError: ".mysqli_connect_error());
}
/*
$c=mysqli_connect("localhost","root","","port");
if(mysqli_connect_errno()){
    die("Can't connect to database\nError: ".mysqli_connect_error());
}*/