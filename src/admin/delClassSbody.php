<?php

        include '../db/connection.php';
        if($_GET['st']){
        mysqli_query($conn, "delete from classroom_student where student_id = '" . $_GET['st'] . "'");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>