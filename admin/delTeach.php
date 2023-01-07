<?php

if(isset($_GET['tc'])){
    include '../db/connection.php';
    mysqli_query($conn,"delete from teacher where teacher_id = '" . $_GET['tc'] . "'");
    header('Location: teachDash.php');

}

?>