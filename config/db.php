<?php

    $conn = mysqli_connect('localhost', 'root', 'yamo123', 'todo_1');

    if(mysqli_connect_errno()) {
        // Connection failed
        echo 'something went wrong'.mysqli_connect_errno();
    }