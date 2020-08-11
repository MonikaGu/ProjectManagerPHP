<?php
$connection = mysqli_connect("localhost","root","mysql");
$db = mysqli_select_db($connection, 'projectmanager');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];
    $firstname = $_POST['firstname'];
    $employees = $_POST['employees'];

    $query = "DELETE FROM projects WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted"); </script>';
        header('Location: projects.php');
    }
    else {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
?>