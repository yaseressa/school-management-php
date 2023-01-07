<?php

if(isset($_GET['su'])){
    include '../db/connection.php';
    mysqli_query($conn,"delete from subject where subject_id = '" . $_GET['su'] . "'");
    header('Location: subjectDash.php');

}

?>