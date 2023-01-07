<?php

if(isset($_GET['st'])){
    include '../db/connection.php';
    mysqli_query($conn,
    "delete from result where student_id = '" . $_GET['st'] . "';" 
);
mysqli_query($conn,
"delete from attendence where student_id = '" . $_GET['st'] . "';" 
);    mysqli_query($conn,
"delete from classroom_student where student_id = '" . $_GET['st'] . "';" 
);    mysqli_query($conn,
"delete from student where student_id = '" . $_GET['st'] . "';" 
);
mysqli_query($conn,
"delete from parent where parent_id = '" . $_GET['st'] . "';" 
);
    header('Location: studentDash.php');

}


?>