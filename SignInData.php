<?php 
    $con = mysqli_connect("localhost","root",""); 

    if(isset($_POST['SignIn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM account_details WHERE email = '$email' and password = '$password'"
        $result=$con->query($sql);
        if($result->num_rows > 0){
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['email']=$row['email'];
            header("index.html");
            exit();  
        }
        else{
            echo"Not Fount, Incorrect Email or Password";
        }      
    }
?>