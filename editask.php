<?php
    require_once 'config/dbconnection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Latest compiled and minified CSS -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div style="margin: 30px;" class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <?php
                                $taskid = $_GET['id'];
                                try {
                                    $stmt = $connection->prepare("SELECT * FROM task WHERE id = :id");
                                    $stmt->bindParam(":id", $taskid, PDO::PARAM_STR);
                                    $stmt->execute();
                                    $task = $stmt->fetchAll();
                                    foreach ($task as $tasks) {
                            ?>
                                <form action="#" method="POST">
                                    <div class="mt-3 md-3">
                                        <label class="form-label">Task Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $tasks['name']; ?>" placeholder="Enter Task name..">
                                    </div>
                                    <div class="mt-3 md-3">
                                        <label class="form-label">Task Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Task Description..."><?php echo $tasks['description']; ?></textarea>
                                    </div>
                                    <div class="mt-3 md-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" name="sdate" id="sdate" value="<?php echo $tasks['sdate']; ?>" class="form-control">
                                    </div>
                                    <div class="mt-3 md-3">
                                        <label class="form-label">End Date</label>
                                        <input type="date" name="edate" id="edate" value="<?php echo $tasks['edate']; ?>" class="form-control">
                                    </div>
                                    <div class="mt-3 md-3">
                                        <label class="form-label">Status</label>
                                        <?php
                                            if($tasks['status'] == 1) {
                                                ?>
                                                <input type="checkbox" name="check" id="status" value="<?php echo $tasks['status']; ?>" checked>
                                                <?php
                                            } else {
                                                ?>
                                                <input type="checkbox" name="check" id="status" value="<?php echo $tasks['status']; ?>">
                                                <?php
                                            }
                                        ?>  
                                    </div>
                                    <input style="margin-top: 20px;" type="submit" class="btn btn-primary" name="Update" value="Update Task">
                                </form>
                            <?php
                                        if(isset($_POST['Update'])) {
                                            try {
                                                $stmt = $connection->prepare("UPDATE task SET name = :name, description = :description, sdate = :sdate, edate = :edate, status = :status WHERE id = :id");
                                                $stmt->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
                                                $stmt->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
                                                $stmt->bindParam(":sdate", $_POST['sdate'], PDO::PARAM_STR);
                                                $stmt->bindParam(":edate", $_POST['edate'], PDO::PARAM_STR);
                                                $stmt->bindParam(":status", $_POST['check'], PDO::PARAM_STR);
                                                $stmt->bindParam(":id", $tasks['id'], PDO::PARAM_STR);
                                                $stmt->execute();
                                                header("location:index.php");
                                            } catch (Exception $e) {
                                                echo "ERROR", $e;
                                            }
                                        }
                                    }
                                } catch (Exception $e) {
                                    echo "Error", $e;
                                }
                            ?>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary"><a style="color: white; text-decoration: none;" href="index.php">Back</a></button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        const status = document.querySelector("#status");
        status.addEventListener("click", function(){
            var complete = document.getElementById("status").value;
            if(complete == 0) {
                document.getElementById("status").setAttribute("value", "1");
            } else {
                document.getElementById("status").setAttribute("value", "0");
            }
        });
    </script>
</html>