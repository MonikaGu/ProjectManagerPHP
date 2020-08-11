<?php
$connection = mysqli_connect("localhost","root","mysql");
$db = mysqli_select_db($connection, 'projectmanager');

if(isset($_POST['insertdata']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $projects = $_POST['projects'];

    $query = "INSERT INTO employees (`id`, `firstname`, `projects`) VALUES ('$id', '$firstname', '$projects')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>