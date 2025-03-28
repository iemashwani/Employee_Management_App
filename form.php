<?php
include("connection.php");
?>

<?php

    if (isset($_POST['search_data'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM employee_data WHERE emp_id = '$search'";
        $data = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($data);

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="center">
        <form action="#" method="POST">
            <h1>Employee Data Management System</h1>
            <div class="form">
                <input type="text" name="search" class="textfield" placeholder="Employee ID" value="<?php 
                    if(isset($_POST["search_data"])) {
                        echo $result['emp_id'];
                    } 
                ?>">
                <input type="text" name="name" class="textfield" placeholder="Employee Name" value="<?php 
                    if(isset($_POST["search_data"])) {
                        echo $result['emp_name'];
                    } 
                ?>">
                <select class="textfield" name="gender">
                    <option value="Not Selected">Select Gender</option>
                    <option value="Male"
                    <?php if(isset($result) && $result['emp_gender'] == 'Male') { 
                        echo "selected";} ?>
                    >Male</option>
                    <option value="Female"
                    <?php if(isset($result) && $result['emp_gender'] == 'Female') { 
                        echo "selected";} ?>
                    >Female</option>
                    <option value="Other"
                    <?php if(isset($result) && $result['emp_gender'] == 'Other') { 
                        echo "selected";} ?>
                    >Other</option>
                </select>
                <input type="text" name="email" class="textfield" placeholder="Email"value="<?php 
                    if(isset($_POST["search_data"])) {
                        echo $result['emp_email'];
                    } 
                ?>">
                <input type="tel" name="number" class="textfield" placeholder="Contact Number" value="<?php 
                    if(isset($_POST["search_data"])) {
                        echo $result['emp_number'];
                    } 
                ?>">
                <select class="textfield" name="department">
                    <option value="Not Selected">Select Department</option>
                    <option value="IT"
                    <?php if(isset($result) && $result['emp_department'] == 'IT') { 
                        echo "selected";} ?>
                    >IT</option>
                    <option value="Accounts"
                    <?php if(isset($result) && $result['emp_department'] == 'Accounts') { 
                        echo "selected";} ?>
                    >Accounts</option>
                    <option value="Sales"
                    <?php if(isset($result) && $result['emp_department'] == 'Sales') { 
                        echo "selected";} ?>
                    >Sales</option>
                    <option value="Human Resource"
                    <?php if(isset($result) && $result['emp_department'] == 'Human Resource') { 
                        echo "selected";} ?>
                    >Human Resource</option>
                    <option value="Business Development"
                    <?php if(isset($result) && $result['emp_department'] == 'Businee Development') { 
                        echo "selected";} ?>
                    >Business Development</option>
                    <option value="Marketing"
                    <?php if(isset($result) && $result['emp_department'] == 'Marketing') { 
                        echo "selected";} ?>
                    >Marketing</option>
                </select>
                <textarea name="address" placeholder="Address"><?php 
                    if(isset($_POST["search_data"])) {
                        echo $result['emp_address'];
                    } 
                ?></textarea>

                <input type="submit" value="Search" name="search_data" class="btn"
                    style="background-color: rgba(150, 141, 139, 0.671)" />
                <input type="submit" value="Save" name="save" class="btn" style="background-color: green" />
                <input type="submit" value="Delete" name="delete_data" class="btn" style="background-color: red" onclick="return check_delete()"/>
                <input type="submit" value="Update" name="update_data" class="btn" style="background-color: orange" />
                <input type="reset" value="Clear" name="" class="btn" style="background-color: blue" />
            </div>
        </form>
    </div>
</body>

</html>


<script>
    function check_delete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>

<?php
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $department = $_POST['department'];
    $address = $_POST['address'];

    $query = "INSERT INTO employee_data (emp_name, emp_gender, emp_email, emp_number, emp_department, emp_address) VALUES ('$name', '$gender', '$email', '$number', '$department', '$address')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('Data Saved Successfully')</script>";
    } else {
        echo "<script>alert('Failed to Save Data')</script>";
    }

}
?>


<?php
    if(isset($_POST['delete_data'])) {
        $id = $_POST['search'];
        $query = "DELETE FROM employee_data WHERE emp_id = '$id'";
        $data = mysqli_query($conn, $query);

        if($data) {
            echo "<script>alert('Record Deleted Successfully')</script>";
        } else {
            echo "<script>alert('Failed to Delete Record')</script>";
        }
    }

?>


<?php

    if(isset($_POST['update_data'])) {
        $id = $_POST['search'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $department = $_POST['department'];
        $address = $_POST['address'];

        $query = "UPDATE employee_data SET emp_name = '$name', emp_gender = '$gender', emp_email = '$email', emp_number = '$number', emp_department = '$department', emp_address = '$address' WHERE emp_id = '$id'";

        $data = mysqli_query($conn, $query);
        if($data) {
            echo "<script>alert('Record Updated Successfully')</script>";
        } else {
            echo "<script>alert('Failed to Update Record')</script>";
        }

    }

?>


