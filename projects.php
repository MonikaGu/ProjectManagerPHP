<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjectManagerPHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="employeesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="insertcode.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label>Project</label>
                    <input type="text" name="projects" class="form-control" placeholder="Enter Project">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
</div>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>Project Manager</h2>
            </div>
            <div class="card">
                <ul>
                    <li style="display:inline-block"><a href="index.php">Employees</a></li>
                    <li style="display:inline-block"><a href="projects.php">Projects</a></li>
                </ul>
            </div>

            <div class="card">
                <div class="card-body">

                <?php
                $connection = mysqli_connect("localhost","root","mysql");
                $db = mysqli_select_db($connection, 'projectmanager');

                $query = "SELECT * FROM projects";
                $query_run = mysqli_query($connection, $query);
                ?>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Employees</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                <?php
                    if ($query_run) {
                        foreach ($query_run as $row) {
                ?>
                        <tbody>
                            <tr>
                                <th><?php echo $row["id"] ?></th>
                                <td><?php echo $row["firstname"] ?></td>
                                <td><?php echo $row["employees"] ?></td>
                                <!-- <td><?php echo $row["action"]?></td> -->
                            </tr>
                        </tbody>

                <?php
                        }
                    } else {
                            echo "No Record Found";
                    }
                ?>
                        
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeesModal">
                        ADD DATA
                    </button>
                </div>
            </div>
        </div>
    </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>