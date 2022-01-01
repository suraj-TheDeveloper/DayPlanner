<!DOCTYPE html>
<html>
    <head>
        <title>Day Planner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div style="margin: 30px;" class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <form action="#" method="POST">
                                <div class="mt-3 md-3">
                                    <label class="form-label">Task Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Task name..">
                                </div>
                                <div class="mt-3 md-3">
                                    <label class="form-label">Task Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter Task Description..."></textarea>
                                </div>
                                <div class="mt-3 md-3">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" name="sdate" id="sdate" class="form-control">
                                </div>
                                <div class="mt-3 md-3">
                                    <label class="form-label">End Date</label>
                                    <input type="date" name="edate" id="edate" class="form-control">
                                </div>
                                <input style="margin-top: 20px;" type="submit" class="btn btn-primary" name="Create" value="Create Task">
                            </form>
                            <?php
                                require_once 'config/dbconnection.php';
                                if(isset($_POST['Create'])) {
                                    try {
                                        $stmt = $connection->prepare("INSERT INTO task (name, description, sdate, edate, status) VALUES (:name, :description, :sdate, :edate, :status)");
                                        $stmt->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
                                        $stmt->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
                                        $stmt->bindParam(":sdate", $_POST['sdate'], PDO::PARAM_STR);
                                        $stmt->bindParam(":edate", $_POST['edate'], PDO::PARAM_STR);
                                        $status = 0;
                                        $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                                        $stmt->execute();
                                        header("location:index.php");
                                    } catch (Exception $e) {
                                        echo "ERROR", $e;
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>