<?php

        include '../db/connection.php';
        if($_GET['cl']){
        mysqli_query($conn, "delete from classroom_student where classroom_id = '" . $_GET['cl'] . "'");
        mysqli_query($conn, "delete from classroom where classroom_id = '" . $_GET['cl'] . "'");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>