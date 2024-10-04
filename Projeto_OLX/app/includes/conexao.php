<?php

    $con = mysqli_connect('localhost','root', '');
    $database = mysqli_select_db($con, 'olx');
    
    if(!$con || !$database) echo mysqli_error($con);

    

?>