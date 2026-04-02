    <?php
        require "db.php";

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($conn) {
            echo "DB Connected Successfully";
        }

        
        $showModal = false;
        $success = false;

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
                $validate_err = [];
            $name = "";
            $email = "";
            $password = "";
            $gender = "";
            $skills = [];
            $dob = "";
            $age = $_POST['age'] ?? "";
            $course = $_POST['course'] ?? "";
            $address = $_POST['address'] ?? ""; 

            if(isset($_POST['dob']))
            {
                $dob = $_POST['dob'];
            }

            if(isset($_POST['name']))
            {
                $name = $_POST['name'];
            }

            if(isset($_POST['email']))
            {
                $email = htmlspecialchars($_POST['email']);
            }
            if(isset($_POST['password']))
            {
                $password = $_POST['password'];
            }
            if(isset($_POST['gender']))
            {
                $gender = $_POST['gender'];
            }

            if(isset($_POST['skills']))
            {
                $skills = $_POST['skills'];
            }


            if(empty($name))
            {
                $validate_err['name'] = "Name Required";
            } 
            elseif(!preg_match("/^[a-zA-Z ]*$/",$name))
            {
                $validate_err['name'] = "Only Alphabets allowed";
            }
            if(empty($email))
            {
                $validate_err['email'] = "Email required";
            } 
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $validate_err['email'] = "Invalid email";
            }
            if(strlen($password) < 6)
            {
                $validate_err['password'] = "Password too small";
            }
            if(empty($gender))
            {
                $validate_err['gender'] = "Select gender";
            }
            if(empty($skills))
            {
                $validate_err['skills'] = "Select at least one skill";
            }
            if(empty($dob))
            {
                $validate_err['dob'] = "Select DOB";
            } 
            else 
            {
                $today = date("Y-m-d");
                if($dob > $today){
                    $validate_err['dob'] = "DOB cannot be in future";
                }
            }

            echo "inside request method block";
            $showModal = true;

            if(empty($validate_err))
            {
                $sql = "INSERT INTO student_info (name,email,password,age,gender,course,dob,address)
                        VALUES ( '$name', '$email', '$password', $age, '$gender', '$course', '$dob', '$address')";

                if ($conn->query($sql) === TRUE) 
                {
                    echo "Student inserted <br>";
                    $success = true;
                } 
                else 
                {
                    $validate_err['db'] = "Error: " . $conn->error;            }
            }
        }
        $conn->close();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Student Registration</title>
        <link rel="stylesheet" href="style.css">
        <link href="../bootstrp.css" rel="stylesheet">
    </head>
    <body>

        <form method="POST" id="myform">
            Name:
                <input type="text" name="name" id="name" >
                <span class="error"></span>
            <br>
            Email: 
                <input type="text" name="email" id="email">
                <span class="error" id="emailerr"></span>
            <br>
            Password: 
                <input type="password" name="password" id="password">
                <span class="error" id="passerr"></span>
            <br>
            Age: 
                <input type="number" name="age" id="age">
                <span class="error" id="ageerr"></span>
            <br>
            Gender:
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
                <span class="error" id="gendererr"></span>
            <br>
            Course:
                <select name="course" id="course">
                    <option value="">Select</option>
                    <option value="Mtech">Mtech</option>
                    <option value="MCA">MCA</option>
                </select>
                <span class="error" id="courseerr"></span>
            <br>
            Skills:
                <input type="checkbox" name="skills[]" value="HTML"> HTML
                <input type="checkbox" name="skills[]" value="CSS"> CSS
                <input type="checkbox" name="skills[]" value="PHP"> PHP
                <span class="error" id="skillserr"></span>
            <br>
            Date of Birth: 
                <input type="date" name="dob" id="dob">
                <span class="error" id="doberr"></span>
            <br>
            Address:
                <textarea name="address" id="address"></textarea>
                <span class="error" id="addresserr"></span>
            <br>
            <button class="btn btn-secondary" id="submit" type="submit">Register</button>

        </form>

        <script src="/php_Practice/jquery.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
        <script src="validations.js"></script>


        <div class="modal fade" id="resultModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    <?php if($success): ?>
                        <h4 class="text-success">Success!</h4>
                        <p><b>Name:</b> <?= $name ?></p>
                        <p><b>Email:</b> <?= $email ?></p>
                        <p><b>Age:</b> <?= $age ?></p>
                        <p><b>Gender:</b> <?= $gender ?></p>
                        <p><b>DOB:</b> <?= $dob ?></p>
                        <!-- <p><b>Course:</b> <?= implode(", ", $course) ?></p> -->
                        <p><b>Skills:</b> <?= implode(", ", $skills) ?></p>
                        <p><b>Address:</b> <?= $address ?></p>

                        <button class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <?php else: ?>
                        <h4 class="text-danger">Errors Found</h4>
                        <ul>
                            <?php foreach($validate_err as $err) echo "<li>$err</li>"; ?>
                        </ul>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Try Again</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <?php if($showModal): ?>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('resultModal'));
            myModal.show();
        </script>
        <?php endif; ?>
    </body>
    </html>