<?php

include 'User.php';

$user = new User();


$user->username = $_GET["_username"];
$user->password = $_GET["_password"];




$_user = getUser($user->username, $user->password);




header('Location: index.html');






function getConnection() {
    $servername = "127.0.0.1";
    $dbname = "users_test2";
    $username = "root";
    $password = "admin";
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "EXCEPTION: Connection failed : " . $e->getMessage();
    }
    return $connection;
}

function getUser($username, $password) {
    try {
        $connection = getConnection();
        $sql = "SELECT * FROM users_test2.user WHERE username = '$username'";
        $result = $connection->query($sql);
        $user_ = new User();
        foreach ($result as $row){
            $user_->firstname = $row['firstname'];
            break;
        }
        $connection = null;
       
    } catch (Exception $e) {
        echo "EXCEPTION : Select failed : " . $e->getMessage();
    }
    return $user_;
}

exit();




