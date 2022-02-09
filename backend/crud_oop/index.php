<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
</head>
<body>
    
    <div class="container">
        <h1 class="mt-5">Information Center</h1>
        <a href="insert.php" class="btn btn-success mb-5">Add User</a>
        <table id="myTable" class="table table-bordered table striped">
            <thead>
                <td>#</td>
                <td>FirstName</td>
                <td>LastName</td>
                <td>Email</td>
                <td>Phone Number</td>
                <td>Address</td>
                <td>Posting Date</td>
                <td>Edit</td>
                <td>Delete</td>
            </thead>
            <tbody>
                <?php
                    include_once('function.php');
                    $fetchdata = new DB_con();
                    $sql = $fetchdata->fetchdata();
                    while($row = mysqli_fetch_array($sql)){ 
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phonenumber'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['postingdate'];?></td>
                    <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-white btn-sm">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id'];?>" id="del-btn" class="btn btn-alert btn-sm" onclick="alertNotice()">Del</a></td>
                </tr>    
                <?php } ?>
            </tbody>
        </table>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script>
    function alertNotice(){
        confirm('Are You sure for Remove');
    }

</script>  
</body>
</html>