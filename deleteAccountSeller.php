<?php
session_start();
include_once('database.php');
$Email=$_SESSION['email'];
$Pass=$_POST['Pass'];
$sql="SELECT * FROM sellerdetails WHERE Email='$Email'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $Password=$row['Password'];
        if($Password==$Pass){
            $sql2="DELETE FROM sellerdetails WHERE Email='$Email'";
            if(mysqli_query($conn,$sql2)){
                echo 1;
            }
        }
        else{
            echo 0;
        }
    }
}
?>