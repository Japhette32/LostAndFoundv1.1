<?php
include 'AdminConnect.php';
if (isset($_GET['delete'])){
    $Delete=$_GET['delete'];
    $DeleteQuery=mysqli_query($conn,"Delete from `lost_items` where id=$Delete") or 
    die("Loss Query");
    if($DeleteQuery){
        echo "Item Deleted";
        header('location:ItemsVerification.php');
    }else{
        echo "Unsucessful of deletion of Item";
        header('location:ItemsVerification.php');
    }
}