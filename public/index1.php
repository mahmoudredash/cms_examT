<?php
//include("../include/layout/header.php");
//
//
//
//
//
//
//$data="_                  ";
//echo (cheack_lenth(cheackEmpty(check_data($data)),15,10));
//erorr_function($errors);
//


?>







<?php
/*
//PASSWORD_DEFAULT
echo $defalePass=password_hash("Mahmoud",PASSWORD_DEFAULT)."\n";

echo "<br/><br/>";
echo strlen($defalePass);
echo "\n\n";
@$hash = "$2y$10$Xf85yUQNPOL3M97JPhef8O0em8o1LrUnCwJfV25iENpHIPwjfxux6";
if(password_verify("mahmoud",$hash)){
    echo "Passowrd is Valid ";
}else{
    echo "Invalid Passowrd ! ";
}*/

/*
//PASSWORD_BCRYPT
 $bcriptPasswd=password_hash("mahmoud",PASSWORD_BCRYPT);

echo "<br/>".$bcriptPasswd."<br/>";

echo strlen($bcriptPasswd) ,"<br/>";


if(password_verify("mahmoud",$bcriptPasswd)){
    echo "<br/> Password IS Valid !";
}else{
    echo "<br/> Password Is INvalid";
}*/

/*
 $options=[
    'cost'=>12,
];

$bcriptPasswd=password_hash("mahmoud",CRYPT_BLOWFISH,$options);
//$bcriptPasswd=password_hash("mahmoud",PASSWORD_DEFAULT,$options);
//$bcriptPasswd=password_hash("mahmoud",PASSWORD_BCRYPT,$options);

echo "<br/>".$bcriptPasswd."<br/>";

echo strlen($bcriptPasswd) ,"<br/>";


if(password_verify("mahmoud",$bcriptPasswd)){
    echo "<br/> Password IS Valid !";
}else{
    echo "<br/> Password Is INvalid";
}
*/


//salt Manuel
/*
$options=[
    'cost'=>12,
];
//this password
$myPassword="mahmoud";
//init salt
$mysqlt = md5(uniqid(rand(),true));
//add salt
$passwdSalt=$myPassword.$mysqlt;

echo "<br/> Passowrd : ",$myPassword;
echo "<br/>  init salt: ",$mysqlt;
echo "<br/> add salt : ",$passwdSalt;

$hashed_pass = password_hash($passwdSalt,CRYPT_BLOWFISH,$options);

echo "<br/> Hash Password : ",$hashed_pass;
echo "<br/> Size Hash Password : ",strlen($hashed_pass);

if(password_verify($passwdSalt,$hashed_pass)){
    echo "<br/> Password IS Valid !";
}else{
    echo "<br/> Password Is INvalid";
}
//search Cracing hash from [rainbow table]
*/

/*
@$hash="$2y$10$r8Yl20m72Zp6jPsbiMTE0OnvAsxMUwBIFEa/.rRp3uQsGnzcTw8J6";
if(password_verify("123456",$hash)){
    echo "<br/> Password IS Valid !";
}else{
    echo "<br/> Password Is INvalid";
}*/

/*

require_once "../include/connectDB.php";
$hst="";
$re=mysqli_query($conn,"SELECT `id`, `username`, `password` FROM `admin` WHERE `username`='{$hst}' LIMIT 1");
$ru=mysqli_fetch_assoc($re);
if(password_verify("fgjhgk",$ru['password'])){
    echo "<br/> Password Is valid";
}else{
    echo "<br/> Password Is INvalid";
}
*/

?>


