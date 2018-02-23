<?php

   function createUser($fname, $username, $email , $lvllist){
     include('connect.php');
     $password = RanPass();




     $Getmail = Details($username, $email, $password);

     $Encry = crypt($password,st);
     $String = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$Encry}', '{$email}', NULL, '{$lvllist}', 'no')";
     $query= mysqli_query($link, $String);
     if($query){
       redirect_to('admin_index.php');
     }else{
       $message = "Your hirirng practice have failed you. This individual sucks";
       return $message;
     }







     mysqli_close($link);
   }
   include('connect.php');

    function Details($username, $email, $password){
    $to = $email;
    $subj = "You got the e-mail for the confimation of login our movies.";
    $msg =  "Email: ".$email."\n\nPassword: ".$password.'admin_login.php';
    mail($to, $subj, $msg);
    }




    function RanPass() {
    $Alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array();
    $Length = strlen($Alpha) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $Length);
        $password[] = $Alpha[$n];
    }
    return implode($password);
    }








 ?>
