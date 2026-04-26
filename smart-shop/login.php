<?php
    require "db.php";
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //if already logged in we need to check that so that user directly redirects to index.php;
    if(isset($_SESSION['user']))
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        if($_SERVER['REQUEST_METHOD']==='POST')
        {
            // echo $_POST['username'];
            // echo $_POST['password'];
            $user=$_POST['username']??"";
            $password=$_POST['password']??"";

        if(empty($user) || empty($password))
            {
                echo "Please fill all fields";
            }
            else
            {
                $sql="select * from users where name='$user'"; 
                $result=($conn->query($sql))->fetch_assoc();
                if($result)
                {
                    // echo $result['id'];
                    // die;
                    if(password_verify($password, $result['password']))
                    {
                        $_SESSION['user'] = $user;
                        $_SESSION['user_id']=$result['id'];
                        header("Location: index.php");
                        exit();
                    }
                    else
                    {
                        echo "enter correct password";
                    }
                }
                else
                {
                    echo "user does not exists";
                }
                
            }
        }
    }
    //login persistence(protect routes as well)
    //how will you aaccess the login session once logged in it should not go to the same login page.  done

    //session storaage and local storage
    //get data frrom session itself
?>
<form method="POST">
    Enter username:
        <input type="text" name="username"><br><br>
    Enter password:
        <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>



