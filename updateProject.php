<?php
$connection = mysqli_connect("localhost","root","mysql");
$db = mysqli_select_db($connection, 'projectmanager');

if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];
    $firstname = $_POST['firstname'];
    $employees = $_POST['employees'];

    $query = "UPDATE projects SET id = '$id', firstname = '$firstname', employees = '$employees' WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Updated"); </script>';
        header('Location: projects.php');
    }
    else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
?>