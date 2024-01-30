<?php
include "db.php";
if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM tbl_employee WHERE emp_id='$emp_id'");
    if ($query) {
        echo "<script type='text/javascript'>alert('Record deleted');window.location='display-employee.php';</script>";
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
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = mysqli_query($con, "SELECT * FROM tbl_employee");
                    $i = 1;
                    if (mysqli_num_rows($q) != 0) {
                        while ($r = mysqli_fetch_array($q)) {
                    ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $r['emp_name'] ?></td>
                                <td><?= $r['emp_gender'] ?></td>
                                <td><?= $r['emp_mobile'] ?></td>
                                <td width="15%"><a href="display-employee.php?id=<?= $r['emp_id'] ?>" class="btn btn-sm btn-danger me-2">Delete</a><a href="edit-employee.php?id=<?= $r['emp_id'] ?>" class="btn btn-sm btn-warning">Edit</a></td>
                            </tr>
                        <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="5">No Records Found</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>