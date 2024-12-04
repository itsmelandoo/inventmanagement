<?php
// CONNECTING TO THE SERVER AND DATABASE
include 'connect.php';

// FETCH THE PRODID TO SELECT THE DATA TO BE DELETED
if(isset($_GET['deleteid'])){
    $ProdId=$_GET['deleteid'];

    $sql = "DELETE FROM prodinvent WHERE ProdId=$ProdId";
    $result = mysqli_query($connection,$sql);
    //REDIRECTING THE USER TO THE CUSTOMIZE PAGE
    if($result){
        header("location: items-editanddelete.php");
    }else{
    

    }
}
?>