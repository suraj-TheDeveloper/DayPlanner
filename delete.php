<?php
    require_once 'config/dbconnection.php';
    try {
        if(isset($_GET['id'])) {
            $stmt = $connection->prepare("DELETE FROM task WHERE id = :id");
            $stmt->bindParam(":id", $_GET['id'], PDO::PARAM_STR);
            $stmt->execute();
            header("location:index.php");
        }
    } catch (Exception $e) {
        echo "Error", $e;
    }
?>