<?php
// function to create a new user account
function connectForCreatingAccount($username,$email,$password,$usertype,$phno)
{
    $servername = "localhost";
    $user= "root";
    $pass = "ghost";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
 // echo $username.$password.$email.$usertype; 
$verify = $conn->prepare("SELECT * FROM `user` WHERE `email` = ? ");
if($verify)
{
    $verify->bind_param("s",$email);
    $verify->execute() or die($conn->error);
    $result = $verify->get_result();
   // echo $result->num_rows;
    if($result->num_rows > 0)
    {
        
        $conn->close(); 
        return "EMAIL_ALREADY_EXISTS";
    }
}

$date=date("Y-m-d H-m-s");
$notes=$phno;    
//echo $date;
$last_login=$date;
$register_login=$date;    
$pre_stmt = $conn->prepare("INSERT INTO `user`( `name`, `password`,`email`,  `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
$pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
   
if($pre_stmt)
{
     $pre_stmt->bind_param("sssssss",$username,$pass_hash,$email,$usertype,$last_login,$register_login,$notes);
    $result = $pre_stmt->execute() or die($conn->error);
    if($result)
        return $conn->insert_id;
    else
        return "SOME_ERROR";
}else
{
    return "SOME_ERROR";
}
  $conn->close();  
}

// function to verify user
function userLogin($email,$password)
{
    
    $servername = "localhost";
    $user= "root";
    $pass = "ghost";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $pre_stmt = $conn->prepare("SELECT id,name,password,last_login,usertype,notes FROM user WHERE email = ?" );
    if($pre_stmt)
    {
        $pre_stmt->bind_param("s",$email);
        $pre_stmt->execute() or die($conn->error);
        $result = $pre_stmt->get_result();
       // echo $result->num_rows;
        if($result->num_rows < 1)
        {
           return "not registered";
        }else
        {
            $row = $result->fetch_assoc();
            if(password_verify($password,$row["password"]))
            {
                $_SESSION["userid"] = $row["id"];
                $_SESSION["username"] =$row["name"];
                $_SESSION["last_login"] = $row["last_login"];
                $_SESSION["user_type"] = $row["usertype"];
                $_SESSION["emailUpdate"] = $email;
                $_SESSION["phoneNumber"] = $row["notes"];
                $last_login = date("Y-m-d H-m-s");
                
                $pre_stmt=$conn->prepare("UPDATE user SET last_login = ? WHERE email = ?");
                //last login updation
                if($pre_stmt)
                {
                    $pre_stmt->bind_param("ss",$last_login,$email);
                    $result = $pre_stmt ->execute() or die($conn->error);
                    if($result)
                    {
                        return 1;
                    }else
                        return 0;
                }
                
            }else 
            {
                return "password not match";
            }
        }
    }
}
//echo connectForCreatingAccount("Priyanshu","priyanshu88@gmail.com","1234","admin","9897969594");
//echo  userLogin("priyanshu1@gmail.com","1234");

?>