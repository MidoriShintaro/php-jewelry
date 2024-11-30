<?php
    $con = mysqli_connect('localhost', 'root', '', 'trangsuc');

    if (mysqli_connect_errno()) {
        echo "connect failed";
    } 
    else {
        mysqli_query($con, 'SET NAMES UTF8');
    }