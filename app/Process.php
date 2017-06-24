<?php

include 'User.php';

$user = new User();

$user->firstname = $_POST["first"];
$user->lastname = $_POST["last"];
$user->email = $_POST["email"];
$user->username = $_POST["username"];
$user->password = $_POST["password"];







$isValid = $user->validate();

//if(isValid == true)  header('Location: index.html');
//else header('Location: create.html');

insertUser($user->firstname, $user->lastname, $user->email, $user->username, $user->password);
        
if(isValid == true)  header('Location: index.html');
else header('Location: create.html');
//header('Location: index.html');


function getConnection(){
    $servername = "127.0.0.1";
    $dbname = "users_test2";
    $username = "root";
    $password = "admin";
    try{
        $connection = new PDO("mysql:host=$servername;dbname=$dbname",
                $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        echo "EXCEPTION: Connection failed : " . $e->getMessage();
    }
    return $connection;
}




function insertUser($firstname, $lastname, $email, $username, $password){
    try{
        $connection = getConnection();
        $sql = "INSERT INTO user (firstname, lastname, email, username, password) "
                . "VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
        $connection->exec($sql);
        $connection = null;
    } catch(Exception $e){
        echo "EXCEPTION : Insert failed : " . $e->getMessage();
    }
   
}

       
        
        
        
        






exit();


                    