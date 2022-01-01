<?php
    try {
        $connection = new PDO("mysql:host=localhost;dbname=dayplanner", "root", "123456");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "ERROR",$e;
    }
?>