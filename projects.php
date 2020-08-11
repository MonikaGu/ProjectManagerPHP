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
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="insertprojectcode.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <!-- <label>ID</label> -->
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Enter Project Name">
                </div>
                <div class="form-group">
                    <label>Employee</label>
                    <input type="text" name="projects" class="form-control" placeholder="Employees">
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

<!-- edit modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="updateProject.php" method="POST">

            <div class="modal-body">
                <div class="form-group">
                    <!-- <label>ID</label> -->
                    <input type="hidden" name="update_id" id="update_id">
                </div>
                <div class="form-group">
                    <label>Project</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Project Name">
                </div>
                <div class="form-group">
                    <label>Employee</label>
                    <input type="text" name="projects" id="projects" class="form-control" placeholder="Enter Employee">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update data</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- edit modal end -->

<!-- delete modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="deletecode.php" method="POST">

            <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <h4>Do you want to DELETE this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                <button type="submit" name="deletedata" class="btn btn-primary">Yes! Delete it.</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- delete modal end -->

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
                                <th scope="col">NAME</th>
                                <th scope="col">EMPLOYEE</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">DELETE</th>
                            </tr>
                        </thead>
                <?php
                    if ($query_run) {
                        foreach ($query_run as $row) {
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["firstname"] ?></td>
                                <td><?php echo $row["employees"] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn"> EDIT </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                                </td>
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

<!-- delete -->
<script>
$(document).ready(function () {
    $('.deletebtn').on('click', function() {
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
    });
});

</script>


<!-- edit -->
<script>
$(document).ready(function () {
    $('.editbtn').on('click', function() {
        $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#firstname').val(data[1]);
            $('#employees').val(data[2]);

    });
});

</script>

</body>
</html>