<div class="table-responsive">
<table class="table table-bordered shadow-sm">
        <thead>
            <tr>
                <th>Task Id</th>
                <th>Task Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Mark As Complete</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php
            require_once 'config/dbconnection.php';
            $stmt = $connection->prepare("SELECT * FROM task");
            $stmt->execute();
            $fetch = $stmt->fetchAll();
            foreach($fetch as $display) {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $display['id']; ?></td>
                    <td><?php echo $display['name']; ?></td>
                    <td><?php echo $display['description']; ?></td>
                    <td><?php echo $display['sdate']; ?></td>
                    <td><?php echo $display['edate']; ?></td>
                    <td>
                        
                            <input type="hidden" name="id" id="id" value="<?php echo $display['id']; ?>">
                            <?php
                                if($display['status'] == 1) {
                                    ?>
                                    <input type="checkbox" name="check" onclick="updateStatus(<?php echo $display['id']; ?>, <?php echo $display['status'] ?>)" id="status" value="<?php echo $display['status']; ?>" checked>
                                    <?php
                                } else {
                                    ?>
                                    <input type="checkbox" name="check" onclick="updateStatus(<?php echo $display['id']; ?>, <?php echo $display['status'] ?>)" id="status" value="<?php echo $display['status']; ?>">
                                    <?php
                                }
                            ?>  
                        
                    </td>
                    <td><a href="editask.php?id=<?php echo $display['id'] ?>" ><button class="btn btn-primary">Edit</button></a></td>
                    <td>
                        <a href="delete.php?id=<?php echo $display['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            </tbody>
            <?php
            }
        ?>
    </table>
</div>
<script>
    function updateStatus(id, status){
        console.log("clicked");
        var status = {
            id: id,
            status: status
        }   
        console.log(status);
        $.ajax({
            url: 'update.php',
            type: "POST", 
            dataType: 'html',
            contentType: 'application/x-www-form-urlencoded',    
            data: status,
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>