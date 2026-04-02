<?php

$validate_err = [];

$name = $email = $password = $gender = "";
$skills = [];

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = $_POST['name'] ?? "";
    $email = htmlspecialchars($_POST['email'] ?? "");
    $password = $_POST['password'] ?? "";
    $gender = $_POST['gender'] ?? "";
    $skills = $_POST['skills'] ?? [];
    $age = $_POST['age'] ?? "";

    // NAME
    if(empty($name)){
        $validate_err['name'] = "Name required";
    } elseif(!preg_match("/^[a-zA-Z ]+$/",$name)){
        $validate_err['name'] = "Only alphabets allowed";
    }

    // EMAIL
    if(empty($email)){
        $validate_err['email'] = "Email required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validate_err['email'] = "Invalid email";
    }

    // PASSWORD
    if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%]).{6,}$/",$password)){
        $validate_err['password'] = "Weak password";
    }

    // AGE
    if($age < 18 || $age > 60){
        $validate_err['age'] = "Age must be 18–60";
    }

    // GENDER
    if(empty($gender)){
        $validate_err['gender'] = "Select gender";
    }

    // COURSE
    if(empty($_POST['course'])){
        $validate_err['course'] = "Select course";
    }

    // SKILLS
    if(empty($skills)){
        $validate_err['skills'] = "Select at least one skill";
    }

    // DOB
    if(empty($_POST['dob'])){
        $validate_err['dob'] = "DOB required";
    }

    // ADDRESS
    if(strlen(trim($_POST['address'] ?? "")) < 10){
        $validate_err['address'] = "Address too short";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Final Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet">

<style>
body{background:#f4f4f4;}
form{
    width:400px;
    margin:40px auto;
    padding:20px;
    background:#fff;
    border-radius:8px;
}
.error{color:red;font-size:14px;}

.is-valid{border:2px solid green !important;}
.is-invalid{border:2px solid red !important;}
</style>
</head>

<body>

<form method="POST" id="myform">

Name:
<input type="text" name="name" id="name" class="form-control">
<div class="error" id="nameerr"></div>

Email:
<input type="text" name="email" id="email" class="form-control">
<div class="error" id="emailerr"></div>

Password:
<input type="password" name="password" id="password" class="form-control">
<div class="error" id="passerr"></div>

Age:
<input type="number" name="age" id="age" class="form-control">
<div class="error" id="ageerr"></div>

Gender:<br>
<input type="radio" name="gender" value="male"> Male
<input type="radio" name="gender" value="female"> Female
<div class="error" id="gendererr"></div>

Course:
<select name="course" id="course" class="form-control">
<option value="">Select</option>
<option value="Mtech">Mtech</option>
<option value="MCA">MCA</option>
</select>
<div class="error" id="courseerr"></div>

Skills:<br>
<input type="checkbox" name="skills[]" value="HTML"> HTML
<input type="checkbox" name="skills[]" value="CSS"> CSS
<input type="checkbox" name="skills[]" value="PHP"> PHP
<div class="error" id="skillserr"></div>

DOB:
<input type="date" name="dob" id="dob" class="form-control">
<div class="error" id="doberr"></div>

Address:
<textarea name="address" id="address" class="form-control"></textarea>
<div class="error" id="addresserr"></div>

<br>
<input type="submit" class="btn btn-dark w-100">

</form>

<!-- ERROR MODAL -->
<div class="modal fade" id="errorModal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-danger text-white">
<h5>Errors</h5>
</div>
<div class="modal-body" id="errorList"></div>
</div>
</div>
</div>

<!-- SUCCESS MODAL -->
<div class="modal fade" id="successModal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-success text-white">
<h5>Success</h5>
</div>
<div class="modal-body" id="successData"></div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function(){

$("#course").select2();

function setError(id,msg){
    $("#"+id).text(msg);
    $("#"+id).prev().addClass("is-invalid").removeClass("is-valid");
}

function setSuccess(id){
    $("#"+id).text("");
    $("#"+id).prev().addClass("is-valid").removeClass("is-invalid");
}

// NAME
$("#name").on("input",function(){
let v=$(this).val().trim();
if(v==="") setError("nameerr","Required");
else if(!/^[a-zA-Z ]+$/.test(v)) setError("nameerr","Only letters");
else setSuccess("nameerr");
});

// EMAIL
$("#email").on("input",function(){
let v=$(this).val();
if(v==="") setError("emailerr","Required");
else if(!/^\S+@\S+\.\S+$/.test(v)) setError("emailerr","Invalid");
else setSuccess("emailerr");
});

// PASSWORD
$("#password").on("input",function(){
let v=$(this).val();
if(v.length<6) setError("passerr","Min 6 chars");
else if(!/[A-Z]/.test(v)) setError("passerr","Add uppercase");
else if(!/[a-z]/.test(v)) setError("passerr","Add lowercase");
else if(!/[0-9]/.test(v)) setError("passerr","Add number");
else if(!/[@#$%]/.test(v)) setError("passerr","Add special char");
else setSuccess("passerr");
});

// AGE
$("#age").on("input",function(){
let v=$(this).val();
if(v==="" || v<18 || v>60) setError("ageerr","18–60 only");
else setSuccess("ageerr");
});

// COURSE
$("#course").on("change",function(){
if($(this).val()==="") $("#courseerr").text("Select course");
else $("#courseerr").text("");
});

// SKILLS
$("input[name='skills[]']").on("change",function(){
if($("input[name='skills[]']:checked").length===0)
$("#skillserr").text("Select one");
else $("#skillserr").text("");
});

// DOB
$("#dob").on("change",function(){
if($(this).val()==="") $("#doberr").text("Required");
else $("#doberr").text("");
});

// ADDRESS
$("#address").on("input",function(){
let v=$(this).val().trim();
if(v.length<10) $("#addresserr").text("Min 10 chars");
else $("#addresserr").text("");
});

// FINAL CHECK
$("#myform").on("submit",function(e){
let err=false;
$(".error").each(function(){
if($(this).text()!=="") err=true;
});
if(err){
e.preventDefault();
alert("Fix errors first");
}
});

});
</script>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

if(empty($validate_err)){

$data=[
"Name"=>$name,
"Email"=>$email,
"Age"=>$age,
"Gender"=>$gender,
"Course"=>$_POST['course'],
"Skills"=>implode(", ",$skills),
"DOB"=>$_POST['dob'],
"Address"=>$_POST['address']
];

echo "<script>
let d=".json_encode($data).";
window.onload=function(){
let html='<table class=\"table\">';
for(let k in d){
html+=`<tr><th>\${k}</th><td>\${d[k]}</td></tr>`;
}
html+='</table>';
document.getElementById('successData').innerHTML=html;
new bootstrap.Modal(document.getElementById('successModal')).show();
document.getElementById('myform').reset();
}
</script>";

}else{

echo "<script>
let e=".json_encode($validate_err).";
window.onload=function(){
let html='<ul>';
for(let k in e){
html+=`<li>\${e[k]}</li>`;
}
html+='</ul>';
document.getElementById('errorList').innerHTML=html;
new bootstrap.Modal(document.getElementById('errorModal')).show();
}
</script>";

}
}
?>

</body>
</html>