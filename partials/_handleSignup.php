
<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $cpassword = $_POST['signupcPassword'];
    
// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $showError = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}
    else{
    //CHECK WHETHER THIS EMAIL EXISTS
    $existsql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    //alert($numRows);
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`) VALUES ( '$user_email', '$hash')";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                $showAlert = true;
                echo 'Signup success true';
                header("Location: /OS-Visual-Studio/forum-backend/forum.php?signupsuccess=true");
                exit();
            }

        }
        else{
            $showError = "Passwords do not match"; 
            
        }
    }
}
    header("Location: /OS-Visual-Studio/forum-backend/forum.php?signupsuccess=false&error=$showError");
}

?>