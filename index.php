<!DOCTYPE html>
<html>
    <head>
        <title>Day Planner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body style="background: #F4F4F4;">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Task Planner</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="createtask.php">Create Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="timesheets.php">Time Sheets</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <input type="button" style="margin: 12px;" id="timer" class="btn btn-primary" value="Start Timer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <span id="display"></span>
                </div>
            </div>
        </div>
    </body>
    <script>
        // const event = document.querySelector("#status");
        // event.addEventListener("click", function(){
        $(document).ready(function(){
            $.ajax({
                url: 'display.php',
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $("#display").html(data);
                }
            });
        });
        // })
        document.getElementById("timer").setAttribute("value", "Start Timer");
        const timer = document.querySelector("#timer");
        timer.addEventListener("click", function(){
            var starttimer = document.getElementById("timer").value;
            console.log(starttimer);
            if(starttimer == "Start Timer") {
                document.getElementById("timer").setAttribute("value", "Stop Timer");
                var startime = new Date();
                console.log(startime);
            } else {
                document.getElementById("timer").setAttribute("value", "Start Timer");
                var stoptime = new Date();
                console.log(stoptime);
                var totaltime = Math.abs(startime.getTime() - totaltime.getTime()) / 1000;
                var totaltime = totaltime/60;
                console.log(totaltime);
            }
        });
    </script>
</html>