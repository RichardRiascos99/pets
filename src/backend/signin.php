<?php
include('../../config/database.php');

$email = $_POST['email'];
$passwd =$_POST['passwd'];
$enc_pass = md5($passwd);

$sql = "
    SELECT
        *
    FROM
        users
    WHERE
        email = '$email' AND
        passwd = '$enc_pass'
    LIMIT 1
";

$result = pg_query($conn, $sql);
$total = pg_num_rows($result);

if($total > 0){
    //echo "Login OK"
    header("refresh:0;url= ../home.php");
}else{
    echo "credenciales incorrectas";
}

?>