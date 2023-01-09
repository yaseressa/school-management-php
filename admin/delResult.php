<?php

        include '../db/connection.php';
        if($_GET['res'] && $_GET['st'] && $_GET['ex']){
         mysqli_query($conn, "delete from result where student_id = '" . $_GET['st'] . "' AND subject_id = '" . $_GET['res'] ."' AND exam_id = '" . $_GET['ex'] . "';");
         header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
?>