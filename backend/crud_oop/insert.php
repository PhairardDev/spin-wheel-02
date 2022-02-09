<?php
   include_once("function.php");
    $insertdata = new DB_con();

    if(isset($_POST['insert'])){
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $phonenumber=$_POST['phonenumber'];
        $address=$_POST['address'];

        $sql = $insertdata->insert($fname,$lname,$email,$phonenumber,$address);

        if($sql){
            echo "<script>alert('Add New user is done');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error can't add new user. Please try again');</script>";
            echo "<script>window.location.href='insert.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add User</h1>
        <hr>
        <form class="row g-3 needs-validation" action="" method="post" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationCustom01" name="firstname" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" name="lastname" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustomEmail" name="email" required>
                <div class="invalid-feedback">
                    Please enter a Email.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomphone" class="form-label">phone</label>
                <input type="text" class="form-control" id="validationCustomphone" name="phonenumber" maxlength="10" required>
                <div class="invalid-feedback">
                    Please enter a Phone Number.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationCustom03" name="address" required>
                <div class="invalid-feedback">
                Please provide a valid city.
                </div>
            </div>
            
            <div class="col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" name="insert" type="submit">เพิ่มข้อมูล</button>
                <a class="btn btn-alert" href="index.php">ยกเลิก</a>
            </div>
            </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

</body>
</html>