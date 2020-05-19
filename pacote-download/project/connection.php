<?php
function DBConnect(){
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die(mysqli_error());
    mysqli_set_charset($conn,CHARSET) or die(mysqli_error($conn));
    return $conn;
}
function DBClose($conn){
    mysqli_close($conn) or die(mysqli_close($conn));
}

