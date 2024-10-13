<?php

 $db_name = 'mysql:host=localhost;dbname=noor_surgical';
 $user_name = 'root';
 $user_password = '';
 $conn = new PDO($db_name , $user_name , '');


 if(!$conn){
    echo 'did not connect to database';
 }

 function unique_id(){
    $chars = '0123456789';
    $charLength = strlen($chars);
    $randomString = '';

    for($i=0 ; $i <8 ; $i++){
        $randomString .= $chars[mt_rand(0, $charLength - 1)];  // concatenation 
    }
    return $randomString;
 }
?>