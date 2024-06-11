<?php
require 'function.php';

if(isset($_SESSION['login'])){
    //done
  }  else{
    header('location:info.php');
    //header('location:login.php');
    
  }

?>