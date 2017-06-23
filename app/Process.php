<?php

include 'User.php';

$user = new User();

$user->firstname = $_POST["1"];
$user->lastname = $_POST["2"];
$user->email = $_POST["3"];
$user->username = $_POST["4"];
$user->password = $_POST["password1"];

$isValid = $user->validate();

if(isValid == true)  header('Location: index.html');
else header('Location: create.html');


function getConnection(){
    $servername = "127.0.0.1";
    $dbname = "user_test";
    $username = "root";
    $password = "admin";
    try{
        echo "lolol";
    }catch(Exception $e){
        echo "EXCEPTION: Connection failed : " . $e->getMessage();
    }
    return $connection;
}










exit();


                    