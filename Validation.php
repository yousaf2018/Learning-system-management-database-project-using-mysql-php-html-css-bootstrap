<?php 
$connection = mysqli_connect("localhost","root","","learning management system");
session_start();
if(!$connection){
    die("Connection failed: ". mysqli_connect_error());
}
else{
echo nl2br ("Connection is successfull\n");
$email = $_POST['email'];
$password = $_POST['pwd'];
$query = "SELECT * FROM admin INNER JOIN admin_login ON admin.Aid = admin_login.Aid AND admin.Email = '$email' INNER JOIN login on login.Log_id = admin_login.Log_id and login.login_password='$password'"; 
$result = mysqli_query($connection,$query);
$counter = mysqli_num_rows($result);
if($counter==1){
    echo nl2br ("Login is successful\n");
    foreach($result as $row){
        $_SESSION['admin'] = $row['Name'];
        header('location:admin_panel.php');
    }    
}
else{
    echo nl2br ("User name or password is incorrect\n");
}
$connection->close();
}
?>
