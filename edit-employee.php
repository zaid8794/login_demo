<?php
include "db.php";
$eid = $_GET['id'];
if (!isset($_GET['id'])) {
    header('Location:display-employee.php');
}
$select = mysqli_query($con, "SELECT * FROM tbl_employee WHERE emp_id = '$eid'");
$row = mysqli_fetch_array($select);
if ($_POST) {
    $name = $_POST['emp_name'];
    $gender = $_POST['emp_gender'];
    $mobile = $_POST['emp_mobile'];
    $q = mysqli_query($con, "UPDATE tbl_employee SET emp_name='$name', emp_gender='$gender', emp_mobile='$mobile' WHERE emp_id='$eid'");

    if ($q) {
        echo "<script type='text/javascript'>alert('Record Updated');window.location='display-employee.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="mb-2">
                Name : <input type="text" class="form-control shadow-none" placeholder="Enter Name " name="emp_name" value="<?= $row['emp_name'] ?>" required>
            </div>
            <div class="mb-2">
                Gender : <input type="text" class="form-control shadow-none" placeholder="Enter Gender" name="emp_gender" value="<?= $row['emp_gender'] ?>" required>
            </div>
            <div class="mb-2">
                Mobile : <input type="text" class="form-control shadow-none" placeholder="Enter Mobile" name="emp_mobile" value="<?= $row['emp_mobile'] ?>" required>
            </div>
            <div class="mb-2">
                <input type="submit" class="btn btn-primary ">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>