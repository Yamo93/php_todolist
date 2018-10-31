<?php

    require('config/db.php');

    


    // Adding Posts
    if(isset($_POST['submit'])) {
        $task = mysqli_real_escape_string($conn, $_POST['task']);
        
        $newQuery = "INSERT INTO tasks(task) VALUES('$task')";

        mysqli_query($conn, $newQuery);
    }

    $query = 'SELECT * FROM tasks ORDER BY id DESC';

    $result = mysqli_query($conn, $query);

    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Deleting Post
    if(isset($_POST['delete'])){
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM tasks WHERE id = {$delete_id}";

    mysqli_query($conn, $query);
    }


    mysqli_free_result($result);

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My PHP Todo App</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="container">
<div class="form-group">
    <input type="text" name="task" class="form-control" placeholder="I have to do...">
    <input type="submit" value="Add Task" class="btn btn-primary btn-block" name="submit">
</div>
</form>
</div>
<div class="container mt-4">
    <ul class="list-group">
    <?php foreach($tasks as $task) : ?>
    <li class="list-group-item active"><?php echo $task['task']; ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="delete_id" value="<?php echo $task['id']; ?>">
    <input type="submit" value="Delete" name="delete" class="btn btn-danger  mt-2">
    </form>
    </li>
    <?php endforeach; ?>
    </ul>
</div>
</body>
</html>