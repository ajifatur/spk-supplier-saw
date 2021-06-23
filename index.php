<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['id'])){
    include 'login.php';
}else{
    include 'admin.php';
}