<?php
$connection = mysqli_connect("localhost","root","mysql");
$db = mysqli_select_db($connection, 'projectmanager');

if(isset($_POST['insertdata']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $employees = $_POST['employees'];

    $query = "INSERT INTO projects ( `firstname`, `employees`) VALUES ('$firstname', '$employees')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: projects.php');
    }
    else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>