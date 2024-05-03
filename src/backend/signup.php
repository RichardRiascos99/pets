<?php
include('../../config/database.php');
 $fullname =$_POST['fname'];
 $email =$_POST['email'];
 $passwd =$_POST['passwd'];
 $enc_pass = md5($passwd);

 /* echo "Your fullname: ". $fullname."<br>";
 echo "Your email: ". $email."<br>";
 echo "Your password: ". $passwd."<br>";
 echo "Your password enc: ".$enc_pass."<br>";*/

 $squl_validate_email="SELECT * FROM user WHERE email = '$email'";
 $result = pg_query($conn, $squl_validate_email);
 $total= pg_num_rows($result);
 
 

if($total>0){
  echo"<script>alert('Email already exist')</script>";
  header("refresh:0;url= ../signin.html");
}else{
  $sql = "
  INSERT INTO users (fname, email, passwd ) 
  values ('$fullname' , ' $email', '$enc_pass ')";


  $ans =pg_query($conn,$sql);
  if ($ans){
    echo"<script>alert('User has been registered')</script>";
    header("refresh:0;url= ../signin.html");
  }else{
  
    echo "ERROR" . pg_last_error();
  }
}


  

  // close conection database
  pg_close($conn)

?>