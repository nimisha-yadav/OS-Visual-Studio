<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
   // echo $pass;

    $sql = "SELECT * FROM `users` where user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        // echo $pass;
        // $hash = password_hash($pass, PASSWORD_DEFAULT);
        // echo $hash;
        // echo '<br>';
        // echo $row['user_pass'];
        if(password_verify($pass, $row['user_pass'])){
            //echo 'pass';
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_email'] = $email;
            
            echo "logged in". $email;
        } 
        else{
            echo 'unable to login';
        }
         header("Location: " . $_SERVER["HTTP_REFERER"]);
    } 
     header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>