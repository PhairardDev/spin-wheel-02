<?php
   include_once("function.php");
    $updatedata = new DB_con();

    if(isset($_POST['save'])){
        
        $uid=$_POST['user_id'];
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $phonenumber=$_POST['phonenumber'];
        $address=$_POST['address'];

        $sql = $updatedata->update($fname,$lname,$email,$phonenumber,$address,$uid);

        if($sql){
            echo "<script>alert('Update user information is done');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Can not update user information. Please try again');</script>";
            echo "<script>window.location.href='update.php?id=".$uid."';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit User</h1>
        <hr>
        <?php
            $user_id = $_GET['id'];
            $sql = $updatedata->fetchrecords($user_id);
            $row = mysqli_fetch_array($sql);
        ?>
        <form class="row g-3 needs-validation" action="" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?php echo$row['id'];?>">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationCustom01" name="firstname" value="<?php echo$row['firstname'];?>" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" name="lastname" value="<?php echo$row['lastname'];?>" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustomEmail" name="email" value="<?php echo$row['email'];?>" required>
                <div class="invalid-feedback">
                    Please enter a Email.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomphone" class="form-label">phone</label>
                <input type="text" class="form-control" id="validationCustomphone" name="phonenumber" value="<?php echo$row['phonenumber'];?>" maxlength="10" required>
                <div class="invalid-feedback">
                    Please enter a Phone Number.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationCustom03" name="address" value="<?php echo$row['address'];?>" required>
                <div class="invalid-feedback">
                Please provide a valid city.
                </div>
            </div>
            
            <div class="col-12">
                <button class="btn btn-primary" name="save" type="submit">บันทึก</button>
                <a class="btn btn-alert" href="index.php">ยกเลิก</a>
            </div>
            </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>