<?php
include ("connection.php" ); 
$id =$_GET['id' ]; 
$t = '1'; 

$sql= "UPDATE `employees`  SET  `is_deleted` = '". $t."' WHERE `id` = $id " ;

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record deleted succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record deleted failed!'
    ];
    print_r(json_encode($response));
} 
?> 