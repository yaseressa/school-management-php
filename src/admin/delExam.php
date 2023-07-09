<?php
    include '../db/connection.php';
    if(isset($_GET['ex'])){
    mysqli_query($conn, "delete from result where exam_id = '" . $_GET['ex'] . "';");
    mysqli_query($conn, "delete from exam where exam_id = '" . $_GET['ex'] . "';");
    header('Location: examDash.php');

}

?>