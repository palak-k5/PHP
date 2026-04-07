    <?php
    // require "db.php";
    session_start();
 //if already logged in we need to check that so that user directly redirects to index.php;
    // if(isset($_SESSION['username']))
    //     {
    //         header("Location: index.php");
    //         exit();
    //     }


    if(isset($_POST['username']))
        {
    //         // echo $_POST['username'];
    //         // echo $_POST['password'];
    //         $sql="select count(*) from users where name=$_POST['username']";
    //         $result=$conn->query($sql);
    //         if($result && $result->num_rows>0)
    //             {
                    $_SESSION['user']=$_POST['username'];
                    $_SESSION['password']=$_POST['password'];
                    // $_SESSION['email']=$_POST['email'];
                    header("Location: index.php");
                    exit();
        //         }
            
        }

    //login persistence(protect routes as well)
    //how will you aaccess the login session once logged in it should not go to the same login page

    //session storaage and local storage
    //get data frrom session itself
    ?>

    <form method="POST">
        Enter username:
        <input type="text" name="username">
        <input type="text" name="password">
        <!-- <input type="email" name="email"> -->

        <button type="submit">Login</button>
    </form> 
