<?php
    require_once 'config/dbconnection.php';
    try {
        if($_POST['status'] == 1) {
            $stmt = $connection->prepare("UPDATE task SET status = :status WHERE id = :id");
            $status = 0;
            $stmt->bindParam(":status", $status, PDO::PARAM_INT);
            $stmt->bindParam(":id", $_POST['id'], PDO::PARAM_INT);
            $stmt->execute();
            echo "not completed";
        } else {
            $stmt = $connection->prepare("UPDATE task SET status = :status WHERE id = :id");
            $status = 1;
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":id", $_POST['id'], PDO::PARAM_STR);
            $stmt->execute();
            echo "completed";
        }
    } catch (Exception $e) {
        echo "Error", $e;
    }
?>