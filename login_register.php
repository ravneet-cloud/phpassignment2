<?php

require('connection/connection.php');
session_start();

if(isset($_POST['admin']))
{
    $query="SELECT * FROM `registered_users` WHERE (`email`='$_POST[email_username]' OR `username`='$_POST[email_username]') AND `usertype`='Admin'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {$result_fetch=mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'],$result_fetch['password']))
            {
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$result_fetch['username'];
                header("location:admin_dashboard.php");
            }
            else
            {
                echo"
                <script>
                    alert('Incorrect password');
                    window.location.href='user_login.php';
                </script>
                ";
            }

        }
        else
        {
            echo"
                <script>
                    alert('Email or Username not registered');
                    window.location.href='user_login.php';
                </script>
        ";
        }
    }
    else{
        echo"
        <script>
        alert('Cannot Run Query');
        window.location.href='user_login.php';
        </script>
        ";
    }
}


if(isset($_POST['login']))
{
    $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {$result_fetch=mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'],$result_fetch['password']))
            {
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$result_fetch['username'];
                header("location:index2.php");
            }
            else
            {
                echo"
                <script>
                    alert('Incorrect password');
                    window.location.href='user_login.php';
                </script>
                ";
            }

        }
        else
        {
            echo"
                <script>
                    alert('Email or Username not registered');
                    window.location.href='user_login.php';
                </script>
        ";
        }
    }
    else{
        echo"
        <script>
        alert('Cannot Run Query');
        window.location.href='user_login.php';
        </script>
        ";
    }
}




if(isset($_POST['register']))
    {
        $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]' ";
        $result=mysqli_query($conn,$user_exist_query);
        
                if($result)
                {
                    if(mysqli_num_rows($result)>0)
                    {
                        $result_fetch=mysqli_fetch_assoc($result);
                        if($result_fetch['username']==$_POST['username'])
                        {
                            echo"
                                <script>
                                    alert('$result_fetch[username] - Username already taken');
                                    window.location.href='user_login.php';
                                </script>
                            ";  
                        }
                        else{
                            echo"
                                <script>
                                    alert('$result_fetch[email] - E-mail already registered');
                                    window.location.href='user_login.php';
                                </script>
                            ";  
                        }
                    }
                    else{
                        $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
                        $query="INSERT INTO `registered_users` (`full_name`,`username`,`email`,`password`,`usertype`) VALUES('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','User')";
                        if(mysqli_query($conn,$query))
                        {
                            echo"
                                <script>
                                    alert('Registration Successfull');
                                    window.location.href='user_login.php';
                                </script>
                                ";
                        }
                    }
                    
                }
                else{
                    echo"
                    <script>
                    alert('Cannot Run Query');
                    window.location.href='user_login.php';
                    </script>
                    ";
                }
            
        
    }
?>