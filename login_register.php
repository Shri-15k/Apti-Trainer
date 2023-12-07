<?php 
require('connection.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code)
{
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Server setting                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mihirpatki58@gmail.com';                     //SMTP username
        $mail->Password   = 'esnpxaqukrasqdxb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('mihirpatki58@gmail.com', 'Apti-Tariner');

        $mail->addAddress($email);     //Add a recipient
       
    
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification From Apti Trainer';
        $mail->Body    = "Thanks For Registration ! 
        Click The Link Below To Verify The Email Address
        <a href='http://localhost/AptiTrainer/verify.php?email=$email&v_code=$v_code'>Verify</a>";
        
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }

}

#for login

if(isset($_POST['login']))
{
    $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result=mysqli_query($con,$query);

    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==1)
            {
                if(password_verify($_POST['password'],$result_fetch['password']))
                {
                    #if password matched
                    #echo"right";
                    $_SESSION['logged_in']=true;
                    $_SESSION['username']=$result_fetch['username'];
                    header("location: index.php");
    
    
                }
                else
                {
                    #if password not matched
                    echo"
                    <script>alert('Incorrect Password');
                    window.location.href='index.php';
                    </script>
                    ";
    
                }

            }
            else
            {
                echo"
                <script>alert('Email Not Verified');
                window.location.href='index.php';
                </script>
                ";

            }

        }
        else
        {
            echo"
            <script>alert('Invalid Credentials');
            window.location.href='index.php';
            </script>
            ";
        }

    }
    else
    {
        echo"
                <script>alert('query not executed');
                window.location.href='index.php';
                </script>
        ";
        
        
    }
}
else
{

}

#for registration
if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]'OR `email`='$_POST[email]'";
    $result=mysqli_query($con,$user_exist_query);

    if($result){
        #if any user already exists
        if(mysqli_num_rows($result)>0){
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['username']==$_POST['username'])
            {
                echo"
                    <script>
                    alert(' $result_fetch[username] : This Username Already Exists');
                    window.location.href='index.php';
                    </script>
                ";
            }
            else
            {
            echo"
            <script>
            alert(' $result_fetch[email] : This Email Already Exists');
            window.location.href='index.php';
            </script>
            ";
            }
        }
        else
        {
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $v_code=bin2hex(random_bytes(16));  
            $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`, `verification_code`, `is_verified` ) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$v_code','0')";
            if(mysqli_query($con,$query) && sendMail($_POST['email'],$v_code))
            {
                echo"
                <script>alert('Registration Successful');
                window.location.href='index.php';
                </script>
                ";

            }
            else
            {
                echo"
                <script>alert('query not executed');
                window.location.href='index.php';
                </script>
                ";

            }

        }
    }
    else
    {
        echo"
        <script>alert('query not executed');
        window.location.href='index.php';
        </script>
        ";
    }
}

?>