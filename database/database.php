<?php 


    $server="localhost";
    $username="root";
    $password="";
    $database="videogamelivestreaming_db";



        try{
            $con = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Connection Success";

        }catch(PDOException $e){
            echo "Connection Failed ".$e->getMessage();

        }
    


?>