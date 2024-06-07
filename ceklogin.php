<?php
require 'function.php';

if(isset($_SESSION['login'])){
    //done
  }  else{
    header('location:info.html');
    //header('location:login.php');
    
  }

?>