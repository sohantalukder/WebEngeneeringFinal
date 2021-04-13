<?php
require_once("databaseConnections.php");
$con = createdb();
?>

<!doctype html>
<html lang="en">
<head>
    <title>web site</title>

    
    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="index.css">

</head>
<body>

<main>
<body>
<div class="container">
<form action="index.php" method="post">
name: <input type="text" name="name"><br>
age: <input type="text" name="age"><br>
user name: <input type="text" name="email"><br>
password: <input type="password" name="password"><br>
<input type="submit" name = "submit">
<input type="submit" value ="show" name = "show">
</form>
</div>

<div class="tablediv">
<table class ="datatable">

  <tr>
    <th>name</th>
    <th>id</th>
    <th>age</th>
    <th>user_name</th>
     <th>password</th>
    </tr>
  
    
    <?php
    if(isset($_POST['show'])){
       $result = showData();
    if($result){
        while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td> <?php echo $row['name'];?> </td>
            <td ><?php echo $row['id']; ?> </td>
            <td ><?php echo $row['age'];?> </td>
            <td ><?php echo $row['user_name'];?> </td>
            <td ><?php echo $row['password']; ?> </td>
         </tr>
    <?php
    } } }   ?>

</table>
</div>


<?php


if(isset($_POST['submit'])){
  
    createData();
}


function createData(){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql ="INSERT INTO info (name,age,user_name,password) 
            VALUES ('$name','$age','$email','$password')";
    if(mysqli_query($GLOBALS['con'],$sql)){
        echo "record successfully inserted. ";
    }
    else{
        echo "database error !";
    }
}
function showData(){
    $sql = "SELECT * FROM info";
    $result = mysqli_query($GLOBALS['con'],$sql);
    if(mysqli_num_rows($result)){
        return $result;
    }
}
?>

</body>
</html>