<?php

 $db_name = 'mysql:host=localhost;dbname=noor_surgical';
 $user_name = 'root';
 $user_password = '';
 $conn = new PDO($db_name , $user_name , '');

//  $servername = 'localhost';
//  $db_name = 'noor_surgical';
//  $user_name = 'root';
//  $user_password = '';
//  $conn = new mysqli($servername, $user_name, $user_password, $db_name);

 if(!$conn){
    echo 'did not connect to database';
 }

 function unique_id(){
    $chars = '0123456789abcdefghijklmnoprstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ';
    $charLength = strlen($chars);
    $randomString = '';

    for($i=0 ; $i <20 ; $i++){
        $randomString .= $chars[mt_rand(0, $charLength - 1)];
    }
    return $randomString;
 }
?>