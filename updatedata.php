<?php
$connection = mysqli_connect("localhost","root","mysql");
$db = mysqli_select_db($connection, 'projectmanager');

if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];
    $firstname = $_POST['firstname'];
    $projects = $_POST['projects'];

    $query = "UPDATE employees SET id = '$id', firstname = '$firstname', projects = '$projects' WHERE id = '$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Updated"); </script>';
        header('Location: index.php');
    }
    else {
        echo '<script> alert("Data Not Updated"); </script>';
    }

        $connection = mysqli_connect("localhost","root","mysql");
        $db = mysqli_select_db($connection, 'projectmanager');

        if(isset($_POST['updatedata'])){
        $id = $_POST['update_id'];
        $firstname = $_POST['firstname'];
        $projects = $_POST['projects'];

        
        $query = "UPDATE employees
        JOIN projects
        ON employees.projects = projects.id
        SET employees.projects = projects.firstname";

        $query_run = mysqli_query($connection, $query);
    }

    $connection = mysqli_connect("localhost","root","mysql");
    $db = mysqli_select_db($connection, 'projectmanager');

    if(isset($_POST['updatedata'])){


        $query = "UPDATE projects
        SET projects.employees = (SELECT group_concat(firstname) from employees
        WHERE employees.projects = projects.firstname
        GROUP BY employees.projects)";

        $query_run = mysqli_query($connection, $query);

    }

}

?>